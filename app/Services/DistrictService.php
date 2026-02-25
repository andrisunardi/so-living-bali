<?php

namespace App\Services;

use App\Models\District;
use Illuminate\Support\Facades\DB;

class DistrictService
{
    public function index(
        ?string $search = null,
        array $isShow = [],
        array $isActive = [],
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
        $districts = District::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            })
            ->when($isShow, fn ($q) => $q->whereIn('is_show', $isShow))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $districts->first();
        }

        if ($count) {
            return $districts->count();
        }

        if ($paginate) {
            return $districts->paginate($perPage);
        }

        if ($paginate) {
            return $districts->paginate($perPage);
        }

        return $districts->get();
    }

    public function create(array $data = []): District
    {
        $table = (new District)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        return District::create($data);
    }

    public function update(District $district, array $data = []): District
    {
        $district->update($data);
        $district->refresh();

        return $district;
    }

    public function delete(District $district): bool
    {
        return $district->delete();
    }

    public function show(District $district): District
    {
        $district->is_show = ! $district->is_show;
        $district->save();
        $district->refresh();

        return $district;
    }

    public function active(District $district): District
    {
        $district->is_active = ! $district->is_active;
        $district->save();
        $district->refresh();

        return $district;
    }
}
