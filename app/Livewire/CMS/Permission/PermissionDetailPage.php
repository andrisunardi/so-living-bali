<?php

namespace App\Livewire\CMS\Permission;

use App\Livewire\Component;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;

class PermissionDetailPage extends Component
{
    public Permission $permission;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->permission->loadCount(['roles', 'users']);
    }

    public function delete(): void
    {
        (new PermissionService)->delete(permission: $this->permission);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.permission').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.permission.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.permission.detail');
    }
}
