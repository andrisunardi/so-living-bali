<?php

namespace App\Services;

use App\Models\Oauth;
use Illuminate\Support\Facades\DB;

class OauthService
{
    public function index(
        ?string $search = null,
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
        $oauths = Oauth::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $oauths->first();
        }

        if ($count) {
            return $oauths->count();
        }

        if ($paginate) {
            return $oauths->paginate($perPage);
        }

        if ($paginate) {
            return $oauths->paginate($perPage);
        }

        return $oauths->get();
    }

    public function create(array $data = []): Oauth
    {
        $table = (new Oauth)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        return Oauth::create($data);
    }

    public function update(Oauth $oauth, array $data = []): Oauth
    {
        $oauth->update($data);
        $oauth->refresh();

        return $oauth;
    }

    public function delete(Oauth $oauth): bool
    {
        return $oauth->delete();
    }
}
