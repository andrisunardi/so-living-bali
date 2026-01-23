<?php

namespace App\Livewire\CMS\Role;

use App\Livewire\Component;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Role;

class RoleDetailPage extends Component
{
    public Role $role;

    public function mount(Role $role): void
    {
        $this->role = $role;
        $this->role->loadCount(['permissions', 'users']);
    }

    public function delete(): void
    {
        (new RoleService)->delete(role: $this->role);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.role').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.role.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.role.detail');
    }
}
