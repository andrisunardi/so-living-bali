<?php

namespace App\Services;

use App\Libraries\GoogleDrive;
use App\Models\Property;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertyService
{
    public function index(
        ?string $search = null,
        ?string $userId = null,
        ?string $districtId = null,
        ?string $areaId = null,
        ?string $status = null,
        ?string $startDate = null,
        ?string $endDate = null,
        bool $random = false,
        bool $trash = false,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        int|string|null $limit = null,
        bool $first = false,
        bool $count = false,
        bool $paginate = true,
        int $perPage = 10,
    ): object|int|null {
        $properties = Property::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%")
                        ->orWhere('address', 'like', "%{$search}%")
                        ->orWhereRelation('user', 'name', 'like', "%{$search}%")
                        ->orWhereRelation('user', 'phone', 'like', "%{$search}%")
                        ->orWhereRelation('user', 'email', 'like', "%{$search}%");
                });
            })
            ->when($userId, fn ($q) => $q->where('user_id', $userId))
            ->when($districtId, fn ($q) => $q->where('district_id', $districtId))
            ->when($areaId, fn ($q) => $q->where('area_id', $areaId))
            ->when($status, fn ($q) => $q->where('status', $status))
            ->when($startDate, fn ($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn ($q) => $q->whereDate('created_at', '<=', $endDate))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $properties->first();
        }

        if ($count) {
            return $properties->count();
        }

        if ($paginate) {
            return $properties->paginate($perPage);
        }

        if ($paginate) {
            return $properties->paginate($perPage);
        }

        return $properties->get();
    }

    public function create(array $data = []): Property
    {
        $table = (new Property)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            $data['availability_date'] = $data['availability_date'] ?: null;
            $data['visit_date'] = $data['visit_date'] ?: null;
            $data['latitude'] = $data['latitude'] ?: null;
            $data['longitude'] = $data['longitude'] ?: null;

            $data['slug'] = Str::slug($data['name']);

            $data['folder_id'] = (new GoogleDrive)->createFolder(
                name: $data['code'],
                parentId: config('constants.folder_id.property'),
            );

            if ($data['image'] ?? null) {
                $data['image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['image'],
                    name: 'cover',
                    folderId: $data['folder_id'],
                );
            }

            if ($data['internet_speedtest_image'] ?? null) {
                $data['internet_speedtest_image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['internet_speedtest_image'],
                    name: 'internet-speedtest',
                    folderId: $data['folder_id'],
                );
            }

            Arr::pull($data, 'image');
            Arr::pull($data, 'internet_speedtest_image');

            $property = Property::create($data);

            DB::commit();

            return $property;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Property $property, array $data = []): Property
    {
        try {
            DB::beginTransaction();

            $data['availability_date'] = $data['availability_date'] ?: null;
            $data['visit_date'] = $data['visit_date'] ?: null;
            $data['latitude'] = $data['latitude'] ?: null;
            $data['longitude'] = $data['longitude'] ?: null;

            $data['slug'] = Str::slug($data['name']);

            if ($property->code != $data['code']) {
                $data['folder_id'] = (new GoogleDrive)->renameFolder(
                    folderId: $property->folder_id,
                    name: $data['code'],
                );
            }

            if ($data['image'] ?? null) {
                $data['image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['image'],
                    name: 'cover',
                    folderId: $property->folder_id,
                );

                if ($property->image_path) {
                    (new GoogleDrive)->delete($property->image_path);
                }
            }

            if ($data['internet_speedtest_image'] ?? null) {
                $data['internet_speedtest_image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['internet_speedtest_image'],
                    name: 'internet-speedtest',
                    folderId: $property->folder_id,
                );

                if ($property->internet_speedtest_image_path) {
                    (new GoogleDrive)->delete($property->internet_speedtest_image_path);
                }
            }

            Arr::pull($data, 'image');
            Arr::pull($data, 'internet_speedtest_image');

            $property->update($data);
            $property->refresh();

            DB::commit();

            return $property;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Property $property): bool
    {
        if ($property->folder_id) {
            (new GoogleDrive)->delete(fileId: $property->folder_id);
        }

        return $property->delete();
    }
}
