<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function index(
        ?string $search = '',
        ?string $guardName = '',
        int|string|null $permissionId = null,
        int|string|null $userId = null,
        bool $random = false,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        ?string $limit = null,
        bool $first = false,
        bool $count = false,
        bool $paginate = true,
        int $perPage = 10,
    ): object|int|null {
        $roles = Role::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('guard_name', 'like', "%{$search}%")
                        ->orWhereRelation('users', 'name', 'like', "%{$search}%")
                        ->orWhereRelation('users', 'phone', 'like', "%{$search}%")
                        ->orWhereRelation('users', 'email', 'like', "%{$search}%");
                });
            })
            ->when($guardName, fn ($q) => $q->where('guard_name', $guardName))
            ->when($permissionId, fn ($q) => $q->whereRelation('permissions', 'id', $permissionId))
            ->when($userId, fn ($q) => $q->whereRelation('users', 'id', $userId))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $roles->first();
        }

        if ($count) {
            return $roles->count();
        }

        if ($paginate) {
            return $roles->paginate($perPage);
        }

        return $roles->get();
    }

    public function create(array $data = []): Role
    {
        $table = (new Role)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            $permissions = Permission::whereIn('id', $data['permission_ids'])->get();
            Arr::pull($data, 'permission_ids');

            $role = Role::create($data);
            $role->givePermissionTo($permissions);

            DB::commit();

            return $role;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Role $role, array $data = []): Role
    {
        try {
            DB::beginTransaction();

            $permissions = Permission::whereIn('id', $data['permission_ids'])->get();
            Arr::pull($data, 'permission_ids');

            $role->update($data);
            $role->syncPermissions($permissions);
            $role->refresh();

            DB::commit();

            return $role;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Role $role): bool
    {
        return $role->delete();
    }
}
