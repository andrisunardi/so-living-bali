<?php

use App\Livewire\Component;
use App\Services\RoleService;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Role;

new #[Title('Detail | Role')] class extends Component {
    public Role $role;

    public function mount(Role $role): void
    {
        $this->role = $role;
        $this->role->loadMissing(['permissions', 'users']);
    }

    public function delete(): void
    {
        $service = new RoleService();
        $service->delete(role: $this->role);

        session()->flash('success', [
            'title' => 'Delete Success',
            'message' => 'Role has been successfully deleted.',
        ]);

        $this->redirect(route('role.index'), navigate: true);
    }
};
?>

@section('title', 'Role')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-info">
            <span class="fas fa-list fa-fw"></span>
            Detail @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-info w-100" href="{{ route('role.index') }}" wire:navigate>
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
                        {{ $role->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Name</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $role->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Guard Name</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $role->guard_name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total Permission</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false" href="{{ route('permission.index', ['role_id' => $role->id]) }}"
                            wire:navigate>
                            {{ $role->permissions->count() }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total User</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false" href="{{ route('user.index', ['role_id' => $role->id]) }}" wire:navigate>
                            {{ $role->users->count() }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Created At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($role->created_at)
                            {{ $role->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $role->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Updated At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($role->updated_at)
                            {{ $role->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $role->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                <div class="col-lg-6">
                    <h6>List Permission :</h6>
                    @foreach ($role->permissions as $permission)
                        <div>
                            {{ $loop->iteration }}.
                            <a draggable="false"
                                href="{{ route('permission.detail', ['permission' => $permission]) }}">
                                {{ $permission->name }}
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-6">
                    <h6>List User :</h6>
                    @foreach ($role->users as $user)
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
                @can('customer.role.edit')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('role.edit', ['role' => $role]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span> Edit
                        </a>
                    </div>
                @endcan

                @can('customer.role.delete')
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
