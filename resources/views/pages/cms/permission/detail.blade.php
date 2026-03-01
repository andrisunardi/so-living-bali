<?php

use App\Livewire\Component;
use App\Services\PermissionService;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;

new #[Title('Detail | Permission')] class extends Component {
    public Permission $permission;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->permission->loadMissing(['permissions', 'users']);
    }

    public function delete(): void
    {
        $service = new PermissionService();
        $service->delete(permission: $this->permission);

        session()->flash('success', [
            'title' => 'Delete Success',
            'message' => 'Permission has been successfully deleted.',
        ]);

        $this->redirect(route('permission.index'), navigate: true);
    }
};
?>

@section('title', 'Permission')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-info">
            <span class="fas fa-list fa-fw"></span>
            Detail @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-info w-100" href="{{ route('permission.index') }}" wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span> Back
                    </a>
                </div>
            </div>

            <hr />

            <div class="d-grid gap-3">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">ID</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Name</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Guard Name</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->guard_name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total Role</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false" href="{{ route('role.index', ['permission_id' => $permission->id]) }}"
                            wire:navigate>
                            {{ $permission->roles->count() }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total User</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false" href="{{ route('user.index', ['permission_id' => $permission->id]) }}"
                            wire:navigate>
                            {{ $permission->users->count() }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Created At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($permission->created_at)
                            {{ $permission->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $permission->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Updated At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($permission->updated_at)
                            {{ $permission->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $permission->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                <div class="col-lg-6">
                    <h6>List Role :</h6>
                    @foreach ($permission->roles as $role)
                        <div>
                            {{ $loop->iteration }}.
                            <a draggable="false" href="{{ route('role.detail', ['role' => $role]) }}">
                                {{ $role->name }}
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6">
                    <h6>List User :</h6>
                    @foreach ($permission->users as $user)
                        <div>
                            {{ $loop->iteration }}.
                            <a draggable="false" href="{{ route('user.detail', ['user' => $user]) }}">
                                {{ $user->name }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <hr />

            <div class="row g-3">
                @can('customer.permission.edit')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('permission.edit', ['permission' => $permission]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span> Edit
                        </a>
                    </div>
                @endcan

                @can('customer.permission.delete')
                    <div class="col-auto">
                        <button type="button" class="btn btn-danger w-100" wire:click="delete"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="delete">
                                <span class="fas fa-trash fa-fw"></span> Delete
                            </span>
                            <span wire:loading wire:target="delete" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span> Delete
                            </span>
                        </button>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
