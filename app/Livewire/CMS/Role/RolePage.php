<?php

namespace App\Livewire\CMS\Role;

use App\Exports\RoleExport;
use App\Livewire\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RolePage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $permission_id = '';

    public function mount(): void
    {
        if (session()->has('error')) {
            LivewireAlert::title(session('error.title'))
                ->html(session('error.message'))
                ->withConfirmButton('OK')
                ->confirmButtonColor('#dc3545')
                ->error()
                ->show();
        }

        if (session()->has('success')) {
            LivewireAlert::title(session('success.title'))
                ->html(session('success.message'))
                ->withConfirmButton('OK')
                ->confirmButtonColor('#198754')
                ->success()
                ->show();
        }
    }

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

    public function delete(Role $role): void
    {
        (new RoleService)->delete(role: $role);

        LivewireAlert::title(trans('index.delete').' '.trans('index.success'))
            ->html(trans('page.role').' '.trans('message.has_been_successfully_deleted'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function getPermissions(): object
    {
        return (new PermissionService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getRoles(bool $paginate = true): object
    {
        $roles = (new RoleService)->index(
            search: $this->search,
            permissionId: $this->permission_id,
            paginate: $paginate,
        );

        $roles->loadCount(['permissions', 'users']);

        return $roles;
    }

    public function export(): BinaryFileResponse
    {
        LivewireAlert::title(trans('index.export').' '.trans('index.success'))
            ->html(trans('page.role').' '.trans('message.has_been_successfully_exported'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();

        return Excel::download(new RoleExport(
            permissionId: $this->permission_id,
            roles: $this->getRoles(paginate: false),
        ), trans('page.role').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.role.index', [
            'permissions' => $this->getPermissions(),
            'roles' => $this->getRoles(),
        ]);
    }
}
