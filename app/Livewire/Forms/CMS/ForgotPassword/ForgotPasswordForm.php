<?php

namespace App\Livewire\Forms\CMS\ForgotPassword;

use App\Models\User;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ForgotPasswordForm extends Form
{
    #[Validate('required|string|min:1|max:50|exists:users,username')]
    public string $username = '';

    #[Validate('required|string|min:1|max:50|email:rfc,dns|exists:users,email')]
    public string $email = '';

    #[Validate('required|string|min:1|max:50|exists:users,phone')]
    public string $phone = '';

    #[Validate('nullable|boolean')]
    public bool $confirm_reset = false;

    public function set(): void
    {
        $this->reset();
    }

    public function submit(): string
    {
        $this->validate();

        $user = User::query()
            ->where('username', $this->username)
            ->where('email', $this->email)
            ->where('phone', $this->phone)
            ->active()
            ->first();

        if (! $user) {
            return '';
        }

        return (new UserService)->resetPassword($user);
    }
}
