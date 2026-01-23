<?php

namespace App\Livewire\Forms\CMS\Role;

use App\Services\RoleService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleAddForm extends Form
{
    #[Validate('required|string|min:1|max:255|unique:roles,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:255')]
    public string $guard_name = 'web';

    #[Validate('nullable|array|min:0|exists:permissions,id')]
    public array $permission_ids = [];

    public function set(): void
    {
        $this->reset();
        $this->resetValidation();
    }

    public function submit(): Role
    {
        return (new RoleService)->create(data: $this->validate());
    }
}
