<?php

namespace App\Livewire\CMS\Role;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Role\RoleEditForm;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Role;

class RoleEditPage extends Component
{
    public RoleEditForm $form;

    public Role $role;

    public function mount(Role $role): void
    {
        $this->role = $role;
        $this->form->set(role: $role);
    }

    public function resetFields(): void
    {
        $this->form->set(role: $this->role);
    }

    public function submit(): void
    {
        $this->form->submit(role: $this->role);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.role').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.role.index'), navigate: true);
    }

    public function getPermissions(): object
    {
        return (new PermissionService)->index(
            guardName: 'web',
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.role.edit', [
            'permissions' => $this->getPermissions(),
        ]);
    }
}
