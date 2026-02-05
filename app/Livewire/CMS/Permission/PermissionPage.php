<?php

namespace App\Livewire\CMS\Permission;

use App\Exports\PermissionExport;
use App\Livewire\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PermissionPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $role_id = '';

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function delete(Permission $permission): void
    {
        (new PermissionService)->delete(permission: $permission);

        LivewireAlert::title(trans('index.delete').' '.trans('index.success'))
            ->html(trans('page.permission').' '.trans('message.has_been_successfully_deleted'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getPermissions(bool $paginate = true): object
    {
        $permissions = (new PermissionService)->index(
            search: $this->search,
            roleId: $this->role_id,
            paginate: $paginate,
        );

        $permissions->loadMissing(['roles']);
        $permissions->loadCount(['roles', 'users']);

        return $permissions;
    }

    public function export(): BinaryFileResponse
    {
        LivewireAlert::title(trans('index.export').' '.trans('index.success'))
            ->html(trans('page.permission').' '.trans('message.has_been_successfully_exported'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();

        return Excel::download(new PermissionExport(
            roleId: $this->role_id,
            permissions: $this->getPermissions(paginate: false),
        ), trans('page.permission').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.permission.index', [
            'roles' => $this->getRoles(),
            'permissions' => $this->getPermissions(),
        ]);
    }
}
