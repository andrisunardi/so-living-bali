<?php

namespace App\Livewire\Forms\CMS\User;

use App\Models\User;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserEditForm extends Form
{
    public User $user;

    public string $name = '';

    public string $email = '';

    public string $phone = '';

    public string $username = '';

    #[Validate('nullable|string|min:1|max:50')]
    public string $password = '';

    #[Validate('required|boolean')]
    public bool $is_active = true;

    #[Validate('nullable|array|exists:roles,id')]
    public array $role_ids = [];

    public function set(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
        $this->username = $user->username;
        $this->is_active = $user->is_active;
        $this->role_ids = $user->roles()->pluck('id')->toArray();
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:50|unique:users,name,{$this->user->id}",
            'email' => "required|email:rfc,dns|min:1|max:50|unique:users,email,{$this->user->id}",
            'phone' => "required|string|min:1|max:20|unique:users,phone,{$this->user->id}",
            'username' => "required|string|min:1|max:50|unique:users,username,{$this->user->id}",
        ];
    }

    public function submit(User $user): User
    {
        return (new UserService)->update(user: $user, data: $this->validate());
    }
}
