<?php

namespace App\Http\Controllers;

use App\Models\Oauth;
use Google\Client;
use Google\Service\Drive;

class GoogleController extends Controller
{
    protected function client(): Client
    {
        $client = new Client;

        $client->setClientId(config('services.google.client_id'));
        $client->setClientSecret(config('services.google.client_secret'));
        $client->setRedirectUri(config('services.google.redirect'));

        $client->addScope(Drive::DRIVE);

        $client->setAccessType('offline');
        $client->setPrompt('consent');

        return $client;
    }

    public function redirect()
    {
        $url = $this->client()->createAuthUrl();

        return redirect()->away($url);
    }

    public function callback()
    {
        $client = $this->client();

        $token = $client->fetchAccessTokenWithAuthCode(request('code'));

        if (isset($token['error'])) {
            abort(508);
        }

        $oauth = Oauth::where('code', 'GOOGLEDRIVE')->firstOrFail();
        $oauth->refresh_token = $token['refresh_token'];
        $oauth->access_token = $token['access_token'];
        $oauth->token_type = $token['token_type'];
        $oauth->expires_in = $token['expires_in'];
        $oauth->scope = $token['scope'];
        $oauth->created = $token['created'];
        $oauth->save();

        return redirect()->route('cms.home');
    }
}
