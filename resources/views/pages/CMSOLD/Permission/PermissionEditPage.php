<?php

namespace App\Livewire\CMS\Permission;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Permission\PermissionEditForm;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;

class PermissionEditPage extends Component
{
    public PermissionEditForm $form;

    public Permission $permission;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->form->set(permission: $permission);
    }

    public function resetFields(): void
    {
        $this->form->set(permission: $this->permission);
    }

    public function submit(): void
    {
        $this->form->submit(permission: $this->permission);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.permission').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.permission.index'), navigate: true);
    }

    public function getRoles(): object
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
        return view('livewire.cms.permission.edit', [
            'roles' => $this->getRoles(),
        ]);
    }
}
