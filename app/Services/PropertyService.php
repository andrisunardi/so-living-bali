<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Support\Facades\DB;

class PropertyService
{
    public function index(
        ?string $search = null,
        ?string $userId = null,
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

        return Property::create($data);
    }

    public function update(Property $property, array $data = []): Property
    {
        $property->update($data);
        $property->refresh();

        return $property;
    }

    public function delete(Property $property): bool
    {
        return $property->delete();
    }
}
