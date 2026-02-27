<?php

namespace App\Livewire\CMS\User;

use App\Livewire\Component;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class UserDetailPage extends Component
{
    public User $user;

    public function mount(User $user): void
    {
        $this->user = $user;
        $this->user->loadCount('properties');
    }

    public function changeActive(): void
    {
        (new UserService)->active(user: $this->user);

        $this->user->loadCount('properties');

        LivewireAlert::title(trans('index.change_active').' '.trans('index.success'))
            ->html(trans('page.user').' '.trans('message.has_been_successfully_changed'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#198754')
            ->success()
            ->show();
    }

    public function delete(): void
    {
        (new UserService)->delete(user: $this->user);

        session()->flash('success', [
            'title' => trans('index.delete').' '.trans('index.success'),
            'message' => trans('page.user').' '.trans('message.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.user.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.user.detail');
    }
}
