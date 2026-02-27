<?php

namespace App\Livewire\Forms\CMS\User;

use App\Models\User;
use App\Services\UserService;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class UserAddForm extends Form
{
    #[Validate('required|string|min:1|max:50|unique:new_users,name')]
    public string $name = '';

    #[Validate('required|email:rfc,dns|min:1|max:50|unique:new_users,email')]
    public string $email = '';

    #[Validate('required|string|min:1|max:20|unique:new_users,phone')]
    public string $phone = '';

    #[Validate('required|string|min:1|max:50|unique:new_users,username')]
    public string $username = '';

    #[Validate('required|string|min:1|max:50')]
    public string $password = '';

    #[Validate('nullable|image|file|mimes:jpg,jpeg,png,gif,webp|max:12288')]
    public ?TemporaryUploadedFile $image = null;

    #[Validate('required|boolean')]
    public bool $is_active = true;

    #[Validate('nullable|array|exists:roles,id')]
    public array $role_ids = [];

    public function submit(): User
    {
        return (new UserService)->create(data: $this->validate());
    }
}
