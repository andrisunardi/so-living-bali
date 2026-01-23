<?php

namespace App\Livewire\Forms\CMS\Role;

use App\Services\RoleService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleEditForm extends Form
{
    public Role $role;

    public string $name = '';

    #[Validate('required|string|min:1|max:255')]
    public string $guard_name = 'web';

    #[Validate('nullable|array|min:0|exists:permissions,id')]
    public array $permission_ids = [];

    public function set(Role $role): void
    {
        $this->resetValidation();

        $this->role = $role;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;
        $this->permission_ids = $role->permissions->pluck('id')->toArray();
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:255|unique:roles,name,{$this->role->id}",
        ];
    }

    public function submit(Role $role): Role
    {
        return (new RoleService)->update(role: $role, data: $this->validate());
    }
}
