<?php

namespace App\Services;

use App\Libraries\GoogleDrive;
use App\Models\User;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserService
{
    public function index(
        ?string $search = null,
        array $isActive = [],
        int|string|null $roleId = null,
        string|array|null $roleName = null,
        int|string|null $permissionId = null,
        string|array|null $permissionName = null,
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
        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%");
                });
            })
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($roleId, fn ($q) => $q->whereHas('roles', fn ($q) => $q->where('id', $roleId)))
            ->when($roleName, fn ($q) => $q->role($roleName))
            ->when($permissionId, fn ($q) => $q->whereHas('permissions', fn ($q) => $q->where('id', $permissionId)))
            ->when($permissionName, fn ($q) => $q->permission($permissionName))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $users->first();
        }

        if ($count) {
            return $users->count();
        }

        if ($paginate) {
            return $users->paginate($perPage);
        }

        if ($paginate) {
            return $users->paginate($perPage);
        }

        return $users->get();
    }

    public function create(array $data = []): User
    {
        $table = (new User)->getTable();
        DB::statement("ALTER TABLE {$table} AUTO_INCREMENT = 1");

        try {
            DB::beginTransaction();

            if ($data['image'] ?? null) {
                $data['image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['image'],
                    name: $data['username'].'-'.Str::slug($data['name']),
                    folderId: config('constants.folder_id.user'),
                );
            }

            $roles = Role::find($data['role_ids']);

            $data['password'] = Hash::make($data['password']);

            Arr::pull($data, 'image');
            Arr::pull($data, 'role_ids');

            $user = User::create($data);
            $user->assignRole($roles);

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(User $user, array $data = []): User
    {
        try {
            DB::beginTransaction();

            if ($data['image'] ?? null) {
                $data['image_path'] = (new GoogleDrive)->uploadImage(
                    image: $data['image'],
                    name: $data['username'].'-'.Str::slug($data['name']),
                    folderId: config('constants.folder_id.user'),
                );

                if ($user->image_path) {
                    (new GoogleDrive)->delete($user->image_path);
                }
            }

            $roles = Role::find($data['role_ids']);

            $user->syncRoles($roles);

            if ($data['password']) {
                $data['password'] = Hash::make($data['password']);
            } else {
                Arr::pull($data, 'password');
            }

            Arr::pull($data, 'image');
            Arr::pull($data, 'role_ids');

            $user->update($data);
            $user->refresh();

            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function active(User $user): User
    {
        $user->is_active = ! $user->is_active;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function editProfile(User $user, array $data = []): User
    {
        if ($data['image'] ?? null) {
            // $data['image_url'] = (new Upload)->image(
            //     image: $data['image'],
            //     directory: 'user',
            //     name: $data['username'].'-'.Str::slug($data['name']),
            // );
        }

        Arr::pull($data, 'image');

        $user->update($data);
        $user->refresh();

        return $user;
    }

    public function changePassword(User $user, array $data = []): User
    {
        $user->update(['password' => Hash::make($data['new_password'])]);
        $user->refresh();

        return $user;
    }

    public function resetPassword(User $user): string
    {
        $password = Str::random(5);
        $user->update(['password' => Hash::make($password)]);
        $user->refresh();

        return $password;
    }
}
