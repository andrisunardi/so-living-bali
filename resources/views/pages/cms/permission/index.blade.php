<?php

use App\Exports\PermissionExport;
use App\Livewire\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

new #[Title('Permission')] class extends Component {
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $role_id = '';

    public function updating(): void
    {
        $this->resetPage();
    }

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset(['search', 'role_id']);
    }

    public function delete(Permission $permission): void
    {
        $service = new PermissionService();
        $service->delete(permission: $permission);

        $this->alertSuccess(title: 'Delete Success', body: 'Permission has been successfully deleted.');
    }

    public function roles(): object
    {
        $service = new RoleService();
        return $service->index(orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function permissions(bool $paginate = true): object
    {
        $service = new PermissionService();
        $permissions = $service->index(search: $this->search, guardName: 'web', roleId: $this->role_id, paginate: $paginate);
        $permissions->loadCount(['roles', 'users']);

        return $permissions;
    }

    public function export(): BinaryFileResponse
    {
        $this->alertSuccess(title: 'Export Success', body: 'Permission has been successfully exported.');

        $service = new PermissionService();
        $permissions = $service->index(guardName: 'web', orderBy: 'id', sortBy: 'asc', paginate: false);
        $permissions->loadCount(['roles', 'users']);

        return Excel::download(new PermissionExport(permissions: $permissions), 'Permission.xlsx');
    }
};
?>

@section('title', 'Permission')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-search fa-fw"></span>
            Search @yield('title')
        </div>
        <div class="card-body">
            <div class="d-grid gap-3">
                <div class="row g-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-search fa-fw "></span>
                            </div>
                            <input type="search" class="form-control" id="search" name="search" minlength="1"
                                maxlength="50" placeholder="Search" wire:model.lazy="search"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="button" class="btn btn-warning" wire:click="resetFilter"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="resetFilter">
                                <span class="fas fa-eraser fa-fw"></span> Reset Filter
                            </span>
                            <span wire:loading wire:target="resetFilter" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span> Reset Filter
                            </span>
                        </button>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col" wire:ignore>
                        <label class="form-label" for="role_id">Role</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-key fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="role_id" name="role_id" wire:model.lazy="role_id"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                                <option value="">All Role</option>
                                @foreach ($this->roles() as $role)
                                    <option value="{{ $role->id }}" wire:key="role-{{ $role->id }}"
                                        {{ $role->id == $role_id ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-auto">
                        <label class="form-label" for="is_active">Active</label>
                        <div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active_1" name="is_active"
                                    value="1" wire:model.lazy="is_active" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_1">Yes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active_0" name="is_active"
                                    value="0" wire:model.lazy="is_active" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_0">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header text-bg-primary">
            <span class="fas fa-table fa-fw"></span>
            Data @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3">
                @can('permission.add')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('permission.add') }}"
                            wire:navigate>
                            <span class="fas fa-plus fa-fw"></span> Add
                        </a>
                    </div>
                @endcan

                @can('permission.export')
                    <div class="col-auto">
                        <button type="button" class="btn btn-success w-100" wire:click="export"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="export">
                                <span class="fas fa-file-excel fa-fw"></span> Export
                            </span>
                            <span wire:loading wire:target="export" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span> Export
                            </span>
                        </button>
                    </div>
                @endcan
            </div>

            <hr />

            <div class="table-responsive border-bottom mb-3">
                <table
                    class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle table-primary">
                            <th width="1%">#</th>
                            <th width="1%">ID</th>
                            <th>Name</th>
                            <th width="1%">Guard Name</th>
                            <th width="1%">Total Role</th>
                            <th width="1%">Total User</th>
                            <th width="1%">Created At</th>
                            <th width="1%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->permissions() as $permission)
                            <tr wire:key="permission-{{ $permission->id }}">
                                <td class="text-center">
                                    {{ ($this->permissions()->currentPage() - 1) * $this->permissions()->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('permission.detail', ['permission' => $permission]) }}"
                                        wire:navigate>
                                        {{ $permission->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false"
                                        href="{{ route('permission.detail', ['permission' => $permission]) }}"
                                        wire:navigate>
                                        {{ $permission->name }}
                                    </a>
                                </td>
                                <td class="text-center">{{ $permission->guard_name }}</td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('role.index', ['permission_id' => $permission->id]) }}"
                                        wire:navigate>
                                        {{ $permission->roles_count }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('user.index', ['permission_id' => $permission->id]) }}"
                                        wire:navigate>
                                        {{ $permission->users_count }}
                                    </a>
                                </td>
                                <td>{{ $permission->created_at?->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('permission.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('permission.detail', ['permission' => $permission]) }}"
                                                wire:navigate>
                                                <span class="fas fa-list fa-fw"></span> Detail
                                            </a>
                                        @endcan

                                        @can('permission.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('permission.edit', ['permission' => $permission]) }}"
                                                wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span> Edit
                                            </a>
                                        @endcan

                                        @can('permission.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $permission->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $permission->id }})">
                                                    <span class="fas fa-trash fa-fw"></span> Delete
                                                </span>
                                                <span wire:loading wire:target="delete({{ $permission->id }})"
                                                    class="w-100">
                                                    <span class="spinner-border spinner-border-sm"></span> Delete
                                                </span>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    No Data Available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $this->permissions()->links('pagination') }}
        </div>
    </div>
</div>

@script
    <script>
        $("#role_id").on("change", function() {
            @this.set("role_id", $(this).val())
        })
    </script>
@endscript
