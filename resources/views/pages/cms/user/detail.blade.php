<?php

use App\Livewire\Component;
use App\Services\UserService;
use Livewire\Attributes\Title;
use App\Models\User;

new #[Title('Detail | User')] class extends Component {
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->user->loadCount(['roles', 'permissions']);
    }

    public function changeActive(): void
    {
        $service = new UserService();
        $service->active(user: $this->user);

        $this->alertSuccess(title: 'Change Active Success', body: 'User has been successfully changed.');
    }

    public function delete(): void
    {
        $service = new UserService();
        $service->delete(user: $this->user);

        session()->flash('success', [
            'title' => 'Delete Success',
            'message' => 'User has been successfully deleted.',
        ]);

        $this->redirect(route('user.index'), navigate: true);
    }
};
?>

@section('title', 'User')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-info">
            <span class="fas fa-list fa-fw"></span>
            Detail @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-info w-100" href="{{ route('user.index') }}" wire:navigate>
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
                        {{ $user->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Name</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Email</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false" href="mailto:{{ $user->email }}">
                            {{ $user->email }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Phone</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <a draggable="false"
                            href="https://api.whatsapp.com/send?phone={{ Str::slug($user->phone, '') }}"
                            target="_blank">
                            {{ $user->phone }}
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Username</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->username }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Image</div>
                    </div>
                    <div class="col-sm-7 col-md-6 col-lg-5 col-xl-4">
                        @if ($user->image_url)
                            <a draggable="false" href="{{ $user->image_url }}" target="_blank">
                                <img draggable="false" class="img-fluid w-100 h-100 rounded-circle mt-2"
                                    src="{{ $user->image_url }}" alt="User - {{ $user->id }}"
                                    onerror="asset('images/user.png')" />
                            </a>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Active</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @can('customer.user.edit')
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="is_active_{{ $user->id }}" name="is_active" value="1"
                                    {{ $user->is_active ? 'checked' : '' }} wire:click="changeActive({{ $user->id }})"
                                    wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                                <label class="form-check-label text-{{ Str::successDanger($user->is_active) }}"
                                    for="is_active_{{ $user->id }}">
                                    {{ Str::yesNo($user->is_active) }}
                                </label>
                            </div>
                        @else
                            <span class="badge rounded-pill text-bg-{{ Str::successDanger($user->is_active) }}">
                                {{ Str::yesNo($user->is_active) }}
                            </span>
                        @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Roles</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @foreach ($user->roles as $role)
                            <div wire:key="role-{{ $role->id }}">
                                <a draggable="false" href="{{ route('role.detail', ['role' => $role]) }}">
                                    {{ $loop->iteration }}. {{ $role->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total Role</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->roles_count }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Total Permission</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->permissions_count }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Created By</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->createdBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Updated By</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $user->updatedBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Created At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($user->created_at)
                            {{ $user->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $user->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">Updated At</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($user->updated_at)
                            {{ $user->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $user->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                @can('customer.user.edit')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('user.edit', ['user' => $user]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span> Edit
                        </a>
                    </div>
                @endcan

                @can('customer.user.delete')
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

    <livewire:activity-log :model="$user" />
</div>
