<?php

namespace App\Livewire\Forms\CMS\Login;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required|string|min:1|max:30')]
    public string $username = '';

    #[Validate('required|string|min:1|max:30')]
    public string $password = '';

    #[Validate('nullable|boolean')]
    public bool $remember = false;

    public function set(): void
    {
        $this->reset();
    }

    public function submit(): ?User
    {
        $this->validate();

        $data = [
            'username' => $this->username,
            'password' => $this->password,
            'is_active' => true,
        ];

        if (Auth::attempt($data, $this->remember)) {
            return Auth::user();
        }

        return null;
    }
}
