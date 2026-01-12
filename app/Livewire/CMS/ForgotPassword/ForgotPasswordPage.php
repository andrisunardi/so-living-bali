<?php

namespace App\Livewire\CMS\ForgotPassword;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\ForgotPassword\ForgotPasswordForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

class ForgotPasswordPage extends Component
{
    public ForgotPasswordForm $form;

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
    }

    public function changePasswordVisibility(): void
    {
        $this->passwordVisibility = ! $this->passwordVisibility;
    }

    public function submit(): void
    {
        $result = $this->form->submit();

        if (! $result) {
            LivewireAlert::title(trans('index.forgot_password').' '.trans('index.failed'))
                ->html(trans('message.username_or_email_or_phone_is_invalid'))
                ->withConfirmButton('OK')
                ->confirmButtonColor('#dc3545')
                ->error()
                ->show();

            return;
        }

        session()->flash('success', [
            'title' => trans('index.forgot_password').' '.trans('index.success'),
            'message' => trans('field.new_password')." : {$result}",
        ]);

        $this->redirectIntended(route('cms.login'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.forgot-password.index');
    }
}
