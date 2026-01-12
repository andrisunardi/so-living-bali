<?php

namespace App\Livewire\CMS\Login;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Login\LoginForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class LoginPage extends Component
{
    public LoginForm $form;

    public bool $passwordVisibility = false;

    public function mount(): void
    {
        if (Auth::check()) {
            session()->flash('error', [
                'title' => trans('index.login').' '.trans('index.failed'),
                'message' => trans('message.you_already_login'),
            ]);

            $this->redirectIntended(route('cms.index'), navigate: true);
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

    public function changePasswordVisibility(): void
    {
        $this->passwordVisibility = ! $this->passwordVisibility;
    }

    public function submit(): void
    {
        $result = $this->form->submit();

        if ($result) {
            session()->flash('success', [
                'title' => trans('index.login').' '.trans('index.success'),
                'message' => trans('message.you_have_successfully_logged_in'),
            ]);

            $this->redirectIntended(route('cms.index'), navigate: true);

            return;
        }

        LivewireAlert::title(trans('index.login').' '.trans('index.failed'))
            ->html(trans('message.username_or_password_is_invalid'))
            ->withConfirmButton('OK')
            ->confirmButtonColor('#dc3545')
            ->error()
            ->show();
    }

    public function render(): View
    {
        return view('livewire.cms.login.index');
    }
}
