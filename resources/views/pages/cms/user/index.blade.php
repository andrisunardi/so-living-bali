<?php

use App\Exports\UserExport;
use App\Livewire\Component;
use App\Models\User;
use App\Services\RoleService;
use App\Services\PermissionService;
use App\Services\UserService;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

new #[Title('User')] class extends Component {
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: [])]
    public array $is_active = [];

    #[Url(except: '')]
    public string $role_id = '';

    #[Url(except: '')]
    public string $permission_id = '';

    public function updating(): void
    {
        $this->resetPage();
    }

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset(['search', 'is_active', 'role_id', 'permission_id']);
    }

    public function changeActive(User $user): void
    {
        $service = new UserService();
        $service->active(user: $user);

        $this->alertSuccess(title: 'Change Active Success', body: 'User has been successfully changed.');
    }

    public function delete(User $user): void
    {
        $service = new UserService();
        $service->delete(user: $user);

        $this->alertSuccess(title: 'Delete Success', body: 'User has been successfully deleted.');
    }

    public function roles(): object
    {
        $service = new RoleService();
        return $service->index(guardName: 'web', orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function permissions(): object
    {
        $service = new PermissionService();
        return $service->index(guardName: 'web', orderBy: 'name', sortBy: 'asc', paginate: false);
    }

    public function users(bool $paginate = true): object
    {
        $service = new UserService();
        $users = $service->index(search: $this->search, isActive: $this->is_active, roleId: $this->role_id, permissionId: $this->permission_id, paginate: $paginate);
        $users->loadCount(['roles', 'permissions']);
        $users->loadMissing(['roles']);

        return $users;
    }

    public function export(): BinaryFileResponse
    {
        $this->alertSuccess(title: 'Export Success', body: 'User has been successfully exported.');

        $service = new UserService();
        $users = $service->index(orderBy: 'id', sortBy: 'asc', paginate: false);
        $users->loadCount(['roles', 'permissions']);
        $users->loadMissing(['roles', 'createdBy', 'updatedBy']);

        return Excel::download(new UserExport(users: $users), 'User.xlsx');
    }
};
?>

@section('title', 'User')

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
                    <div class="col-sm-6 col-md" wire:ignore>
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

                    <div class="col-sm-6 col-md" wire:ignore>
                        <label class="form-label" for="permission_id">Permission</label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-lock-open fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="permission_id" name="permission_id"
                                wire:model.lazy="permission_id" wire:offline.class="disabled"
                                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">All Permission</option>
                                @foreach ($this->permissions() as $permission)
                                    <option value="{{ $permission->id }}" wire:key="permission-{{ $permission->id }}"
                                        {{ $permission->id == $permission_id ? 'selected' : '' }}>
                                        {{ $permission->name }}
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
                @can('customer.user.add')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('user.add') }}" wire:navigate>
                            <span class="fas fa-plus fa-fw"></span> Add
                        </a>
                    </div>
                @endcan

                @can('customer.user.export')
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
                            <th width="1%">Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Username</th>
                            <th>Join Date</th>
                            <th>Roles</th>
                            <th width="1%">Total</th>
                            <th width="1%">Active</th>
                            <th width="1%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->users() as $user)
                            <tr wire:key="user-{{ $user->id }}">
                                <td class="text-center">
                                    {{ ($this->users()->currentPage() - 1) * $this->users()->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <a draggable="false" href="{{ route('user.detail', ['user' => $user]) }}"
                                        wire:navigate>
                                        {{ $user->id }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if ($user->image_url)
                                        <a draggable="false" href="{{ $user->image_url }}" target="_blank">
                                            <div class="ratio ratio-1x1">
                                                <img draggable="false"
                                                    class="img-fluid w-100 h-100 rounded-circle object-fit-cover"
                                                    src="{{ $user->image_url }}" alt="User - {{ $user->id }}"
                                                    onerror="asset('images/user.png')" />
                                            </div>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a draggable="false" href="{{ route('user.detail', ['user' => $user]) }}"
                                        wire:navigate>
                                        {{ $user->name }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false" href="mailto:{{ $user->email }}">
                                        {{ $user->email }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false"
                                        href="https://api.whatsapp.com/send?phone={{ Str::slug($user->phone, '') }}"
                                        target="_blank">
                                        {{ $user->phone }}
                                    </a>
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->created_at?->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <div wire:key="role-{{ $role->id }}">
                                            <a draggable="false"
                                                href="{{ route('role.detail', ['role' => $role]) }}">
                                                {{ $loop->iteration }}. {{ $role->name }}
                                            </a>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    <div>Role : {{ $user->roles_count }}</div>
                                    <div>Permission : {{ $user->permissions_count }}</div>
                                </td>
                                <td>
                                    @can('customer.user.edit')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="is_active_{{ $user->id }}" name="is_active" value="1"
                                                {{ $user->is_active ? 'checked' : '' }}
                                                wire:click="changeActive({{ $user->id }})"
                                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                            <label
                                                class="form-check-label text-{{ Str::successDanger($user->is_active) }}"
                                                for="is_active_{{ $user->id }}">
                                                {{ Str::yesNo($user->is_active) }}
                                            </label>
                                        </div>
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Str::successDanger($user->is_active) }}">
                                            {{ Str::yesNo($user->is_active) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('customer.user.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('user.detail', ['user' => $user]) }}" wire:navigate>
                                                <span class="fas fa-list fa-fw"></span> Detail
                                            </a>
                                        @endcan

                                        @can('customer.user.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('user.edit', ['user' => $user]) }}" wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span> Edit
                                            </a>
                                        @endcan

                                        @can('customer.user.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $user->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $user->id }})">
                                                    <span class="fas fa-trash fa-fw"></span> Delete
                                                </span>
                                                <span wire:loading wire:target="delete({{ $user->id }})"
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

            {{ $this->users()->links('pagination') }}
        </div>
    </div>
</div>

@script
    <script>
        $("#role_id").on("change", function() {
            @this.set("role_id", $(this).val())
        })
        $("#permission_id").on("change", function() {
            @this.set("permission_id", $(this).val())
        })
    </script>
@endscript
