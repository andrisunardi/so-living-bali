<?php

namespace App\Livewire\CMS\Role;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Role\RoleAddForm;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;

class RoleAddPage extends Component
{
    public RoleAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.role').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.role.index'), navigate: true);
    }

    public function getPermissions(): object
    {
        return (new PermissionService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.role.add', [
            'permissions' => $this->getPermissions(),
        ]);
    }
}
