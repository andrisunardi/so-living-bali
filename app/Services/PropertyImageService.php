<?php

namespace App\Services;

// use App\Libraries\GoogleDrive;
use App\Models\Property;
use App\Models\PropertyImage;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Str;

class PropertyImageService
{
    public function index(
        ?string $search = null,
        ?string $propertyId = null,
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
        $propertyImages = PropertyImage::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('google_file_id', 'like', "%{$search}%")
                        ->orWhereRelation('property', 'code', 'like', "%{$search}%")
                        ->orWhereRelation('property', 'name', 'like', "%{$search}%");
                });
            })
            ->when($propertyId, fn ($q) => $q->where('property_id', $propertyId))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $propertyImages->first();
        }

        if ($count) {
            return $propertyImages->count();
        }

        if ($paginate) {
            return $propertyImages->paginate($perPage);
        }

        if ($paginate) {
            return $propertyImages->paginate($perPage);
        }

        return $propertyImages->get();
    }

    public function create(array $data = []): PropertyImage
    {
        $table = (new Property)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            $property = Property::findOrFail($data['property_id']);

            // if ($data['image'] ?? null) {
            //     $data['image_path'] = (new GoogleDrive)->uploadImage(
            //         image: $data['image'],
            //         name: Str::slug($data['name']),
            //         folderId: $property->folder_id,
            //     );
            // }

            Arr::pull($data, 'image');

            $propertyImage = PropertyImage::create($data);

            DB::commit();

            return $propertyImage;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(PropertyImage $propertyImage, array $data = []): PropertyImage
    {
        try {
            DB::beginTransaction();

            $property = Property::findOrFail($data['property_id']);

            // if ($data['image'] ?? null) {
            //     $data['image_path'] = (new GoogleDrive)->uploadImage(
            //         image: $data['image'],
            //         name: Str::slug($data['name']),
            //         folderId: $property->folder_id,
            //     );

            //     if ($propertyImage->image_path) {
            //         (new GoogleDrive)->delete($propertyImage->image_path);
            //     }
            // }

            Arr::pull($data, 'image');

            $propertyImage->update($data);
            $propertyImage->refresh();

            DB::commit();

            return $propertyImage;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(PropertyImage $propertyImage): bool
    {
        // if ($propertyImage->image_path) {
        //     (new GoogleDrive)->delete(fileId: $propertyImage->image_path);
        // }

        return $propertyImage->delete();
    }
}
