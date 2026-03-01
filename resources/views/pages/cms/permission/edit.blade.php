<?php

use App\Livewire\Component;
use App\Livewire\Forms\Permission\PermissionEditForm;
use App\Services\RoleService;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;
use Spatie\Permission\Models\Permission;

new #[Title('Edit | Permission')] class extends Component {
    public Permission $permission;

    public PermissionEditForm $form;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->form->set(permission: $permission);
    }

    public function resetForm(): void
    {
        $this->form->set(permission: $this->permission);
    }

    public function submit(): void
    {
        try {
            $this->form->submit(permission: $this->permission);

            session()->flash('success', [
                'title' => 'Edit Success',
                'message' => 'Permission has been successfully edited.',
            ]);

            $this->redirect(route('permission.index'), navigate: true);
        } catch (ValidationException $e) {
            $errors = collect($e->validator->errors()->all())->implode('<br>');

            $this->alertError(title: 'Edit Failed', body: $errors);
        }
    }

    public function roles(): object
    {
        $service = new RoleService();
        return $service->index(guardName: 'web', orderBy: 'name', sortBy: 'asc', paginate: false);
    }
};
?>

@section('title', 'Permission')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-success">
            <span class="fas fa-edit fa-fw"></span>
            Edit @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-success w-100" href="{{ route('permission.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span> Back
                    </a>
                </div>
            </div>

            <hr />

            <x-alert-error />

            <form wire:submit.prevent="submit" permission="form" autocomplete="off">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="d-grid gap-3">
                            <div>
                                <label class="form-label" for="name">
                                    Name <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span class="fas fa-key fa-fw "></span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name"
                                        minlength="1" maxlength="255" placeholder="Ex. Admin" required
                                        wire:model="form.name" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                </div>
                                <div class="form-text">
                                    Required, Minlength : 1, Maxlength : 255, Unique
                                </div>
                                @error('form.name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <label class="form-label" for="guard_name">
                                    Guard Name <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <div class="input-group-text">
                                        <span class="fas fa-shield fa-fw "></span>
                                    </div>
                                    <input type="text" class="form-control" id="guard_name" name="guard_name"
                                        minlength="1" maxlength="255" placeholder="Ex. web" required
                                        wire:model="form.guard_name" wire:offline.class="disabled"
                                        wire:offline.attr="disabled" wire:loading.class="disabled"
                                        wire:loading.attr="disabled">
                                </div>
                                <div class="form-text">
                                    Required, Minlength : 1, Maxlength : 255, Default : web
                                </div>
                                @error('form.guard_name')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="d-grid gap-3">
                            <div>
                                <label class="form-label" for="role_ids">
                                    Roles
                                </label>
                                @foreach ($this->roles() as $role)
                                    <div class="form-check" wire:key="role-{{ $role->id }}">
                                        <input class="form-check-input" type="checkbox"
                                            id="role_ids_{{ $role->id }}" name="role_ids"
                                            value="{{ $role->id }}" wire:model="form.role_ids"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">

                                        <label class="form-check-label" for="role_ids_{{ $role->id }}">
                                            {{ $role->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('form.role_ids')
                                    <div class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <button type="submit" class="btn btn-success w-100" wire:offline.class="disabled"
                            wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="submit">
                                <span class="fas fa-save fa-fw"></span> Save
                            </span>
                            <span wire:loading wire:target="submit" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span> Save
                            </span>
                        </button>
                    </div>
                    <div class="col-6 col-sm-auto">
                        <button type="button" class="btn btn-warning w-100" wire:click="resetForm"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="resetForm">
                                <span class="fas fa-eraser fa-fw"></span> Reset
                            </span>
                            <span wire:loading wire:target="resetForm" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span> Reset
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
