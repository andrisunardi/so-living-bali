<?php

namespace App\Livewire\Forms\CMS\Oauth;

use App\Models\Oauth;
use App\Services\OauthService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class OauthEditForm extends Form
{
    public Oauth $oauth;

    public string $code = '';

    public string $name = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $refresh_token = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $access_token = '';

    #[Validate('required|string|min:1|max:65535')]
    public string $token_type = '';

    #[Validate('required|integer|min:0|max:9999999999')]
    public int $expires_in = 0;

    #[Validate('required|string|min:1|max:65535')]
    public string $scope = '';

    #[Validate('required|integer|min:0|max:9999999999')]
    public int $created = 0;

    public function set(Oauth $oauth): void
    {
        $this->oauth = $oauth;
        $this->code = $oauth->code;
        $this->name = $oauth->name;
        $this->refresh_token = $oauth->refresh_token;
        $this->access_token = $oauth->access_token;
        $this->token_type = $oauth->token_type;
        $this->expires_in = $oauth->expires_in;
        $this->scope = $oauth->scope;
        $this->created = $oauth->created;
    }

    public function rules(): array
    {
        return [
            'code' => "required|string|min:1|max:20|unique:oauths,code,{$this->oauth->id}",
            'name' => "required|string|min:1|max:50|unique:oauths,name,{$this->oauth->id}",
        ];
    }

    public function submit(Oauth $oauth): Oauth
    {
        return (new OauthService)->update(oauth: $oauth, data: $this->validate());
    }
}
