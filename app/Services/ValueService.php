<?php

namespace App\Services;

use App\Models\Value;
use Illuminate\Support\Facades\DB;

class ValueService
{
    public function index(
        ?string $search = null,
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
        $values = Value::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('title_id', 'like', "%{$search}%")
                        ->orWhere('title_zh', 'like', "%{$search}%")
                        ->orWhere('short_description', 'like', "%{$search}%")
                        ->orWhere('short_description_id', 'like', "%{$search}%")
                        ->orWhere('short_description_zh', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('description_id', 'like', "%{$search}%")
                        ->orWhere('description_zh', 'like', "%{$search}%")
                        ->orWhere('icon', 'like', "%{$search}%");
                });
            })
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $values->first();
        }

        if ($count) {
            return $values->count();
        }

        if ($paginate) {
            return $values->paginate($perPage);
        }

        if ($paginate) {
            return $values->paginate($perPage);
        }

        return $values->get();
    }

    public function create(array $data = []): Value
    {
        $table = (new Value)->getTable();
        DB::statement("ALTER TABLE `{$table}` AUTO_INCREMENT = 1");

        return Value::create($data);
    }

    public function update(Value $value, array $data = []): Value
    {
        $value->update($data);
        $value->refresh();

        return $value;
    }

    public function delete(Value $value): bool
    {
        return $value->delete();
    }

    public function active(Value $value): Value
    {
        $value->is_active = ! $value->is_active;
        $value->save();
        $value->refresh();

        return $value;
    }
}
