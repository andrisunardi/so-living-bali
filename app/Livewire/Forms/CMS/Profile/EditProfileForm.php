<?php

namespace App\Livewire\Forms\CMS\Profile;

use App\Models\User;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class EditProfileForm extends Form
{
    public User $user;

    public string $name = '';

    public string $phone = '';

    public string $email = '';

    public string $username = '';

    #[Validate('nullable|image|file|mimes:jpg,jpeg,png,gif,webp|max:104857600')]
    public ?TemporaryUploadedFile $image = null;

    public function set(User $user): void
    {
        $this->user = $user;
        $this->name = $user->name;
        $this->phone = $user->phone;
        $this->email = $user->email;
        $this->username = $user->username;
    }

    public function rules(): array
    {
        return [
            'name' => "required|string|min:1|max:50|unique:users,name,{$this->user->id}",
            'phone' => "required|string|min:1|max:20|unique:users,phone,{$this->user->id}",
            'email' => "required|email:rfc,dns|regex:/^\S*$/u|max:50|unique:users,email,{$this->user->id}",
            'username' => "required|string|min:1|max:20|unique:users,username,{$this->user->id}",
        ];
    }

    public function submit(): User
    {
        return (new UserService)->editProfile(user: $this->user, data: $this->validate());
    }
}
