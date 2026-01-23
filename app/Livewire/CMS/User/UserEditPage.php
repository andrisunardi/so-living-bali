<?php

namespace App\Livewire\CMS\User;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\User\UserEditForm;
use App\Models\User;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;

class UserEditPage extends Component
{
    public UserEditForm $form;

    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->form->set(user: $user);
    }

    public function resetFields(): void
    {
        $this->form->set(user: $this->user);
    }

    public function submit(): void
    {
        $this->form->submit(user: $this->user);

        session()->flash('success', [
            'title' => trans('index.edit').' '.trans('index.success'),
            'message' => trans('page.user').' '.trans('message.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.user.index'), navigate: true);
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.user.edit', [
            'roles' => $this->getRoles(),
        ]);
    }
}
