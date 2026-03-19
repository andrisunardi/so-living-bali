<?php

namespace App\Livewire\Forms\CMS\Oauth;

use App\Models\Oauth;
use App\Services\OauthService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OauthAddForm extends Form
{
    #[Validate('required|string|min:1|max:20|unique:oauths,code')]
    public string $code = '';

    #[Validate('required|string|min:1|max:50|unique:oauths,name')]
    public string $name = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $refresh_token = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $access_token = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $token_type = '';

    #[Validate('required|integer|min:1|max:9999999999')]
    public int $expires_in = 0;

    #[Validate('required|string|min:1|max:65535')]
    public string $scope = '';

    #[Validate('required|integer|min:1|max:9999999999')]
    public int $created = 0;

    public function submit(): Oauth
    {
        return (new OauthService)->create(data: $this->validate());
    }
}
