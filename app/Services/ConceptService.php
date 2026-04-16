<?php

namespace App\Services;

use App\Models\Concept;
use Illuminate\Support\Facades\DB;

class ConceptService
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
        $concepts = Concept::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('title_id', 'like', "%{$search}%")
                        ->orWhere('title_zh', 'like', "%{$search}%")
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
            return $concepts->first();
        }

        if ($count) {
            return $concepts->count();
        }

        if ($paginate) {
            return $concepts->paginate($perPage);
        }

        if ($paginate) {
            return $concepts->paginate($perPage);
        }

        return $concepts->get();
    }

    public function create(array $data = []): Concept
    {
        $table = (new Concept)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        return Concept::create($data);
    }

    public function update(Concept $concept, array $data = []): Concept
    {
        $concept->update($data);
        $concept->refresh();

        return $concept;
    }

    public function delete(Concept $concept): bool
    {
        return $concept->delete();
    }

    public function active(Concept $concept): Concept
    {
        $concept->is_active = ! $concept->is_active;
        $concept->save();
        $concept->refresh();

        return $concept;
    }
}
