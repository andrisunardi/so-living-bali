<?php

namespace App\Livewire\Forms\CMS\Permission;

use App\Services\PermissionService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;

class PermissionEditForm extends Form
{
    public Permission $permission;

    public string $name = '';

    #[Validate('required|string|min:1|max:255')]
    public string $guard_name = 'web';

    #[Validate('nullable|array|min:0|exists:roles,id')]
    public array $role_ids = [];

    public function set(Permission $permission): void
    {
        $this->resetValidation();

        $this->permission = $permission;
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
        $this->role_ids = $permission->roles->pluck('id')->toArray();
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:255|unique:permissions,name,{$this->permission->id}",
        ];
    }

    public function submit(Permission $permission): Permission
    {
        return (new PermissionService)->update(permission: $permission, data: $this->validate());
    }
}
