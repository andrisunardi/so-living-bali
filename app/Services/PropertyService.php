<?php

namespace App\Services;

use App\Libraries\Upload;
use App\Models\Property;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yaza\LaravelGoogleDriveStorage\Gdrive;

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
            ->when($userId, fn($q) => $q->where('user_id', $userId))
            ->when($districtId, fn($q) => $q->where('district_id', $districtId))
            ->when($areaId, fn($q) => $q->where('area_id', $areaId))
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->when($random, fn($q) => $q->inRandomOrder())
            ->when($trash, fn($q) => $q->onlyTrashed())
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

            Gdrive::makeDir("PROPERTY/{$data['code']}");

            if ($data['image'] ?? null) {
                $data['image_url'] = (new Upload)->image(
                    image: $data['image'],
                    directory: "PROPERTY/{$data['code']}",
                    name: 'cover',
                );
            }

            Arr::pull($data, 'image');

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

            if ($data['image'] ?? null) {
                $data['image_url'] = (new Upload)->image(
                    image: $data['image'],
                    directory: "PROPERTY/{$data['code']}",
                    name: 'cover',
                );
            }

            $data['slug'] = Str::slug($data['name']);

            Arr::pull($data, 'image');

            Gdrive::renameDir("PROPERTY/{$property->code}", "PROPERTY/{$data['code']}");

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
        Gdrive::deleteDir($property->code);

        return $property->delete();
    }
}
