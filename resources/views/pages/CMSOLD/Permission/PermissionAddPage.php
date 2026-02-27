<?php

namespace App\Livewire\CMS\Permission;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Permission\PermissionAddForm;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;

class PermissionAddPage extends Component
{
    public PermissionAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();
    }

    public function submit(): void
    {
        $this->form->submit();

        session()->flash('success', [
            'title' => trans('index.add').' '.trans('index.success'),
            'message' => trans('page.permission').' '.trans('message.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.permission.index'), navigate: true);
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            guardName: 'web',
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.permission.add', [
            'roles' => $this->getRoles(),
        ]);
    }
}
