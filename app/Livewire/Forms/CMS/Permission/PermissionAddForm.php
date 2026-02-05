<?php

namespace App\Livewire\Forms\CMS\Permission;

use App\Services\PermissionService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Permission;

class PermissionAddForm extends Form
{
    #[Validate('required|string|min:1|max:255|unique:permissions,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:255')]
    public string $guard_name = 'web';

    #[Validate('nullable|array|min:0|exists:roles,id')]
    public array $role_ids = [];

    public function set(): void
    {
        $this->reset();
        $this->resetValidation();
    }

    public function submit(): Permission
    {
        return (new PermissionService)->create(data: $this->validate());
    }
}
