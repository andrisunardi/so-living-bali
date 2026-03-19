<?php

namespace Database\Seeders;

use App\Models\Oauth;
use Illuminate\Database\Seeder;

class OauthSeeder extends Seeder
{
    public function run(): void
    {
        Oauth::create([
            'code' => 'GOHIGHLEVEL',
            'name' => 'GO High Level PT REB (Real Estate Bali)',
            'refresh_token' => '',
            'access_token' => '',
            'token_type' => '',
            'expires_in' => 0,
            'scope' => '',
            'created' => 0,
        ]);

        Oauth::create([
            'code' => 'GOOGLEDRIVE',
            'name' => 'Google Drive PT REB (Real Estate Bali)',
            'refresh_token' => '',
            'access_token' => '',
            'token_type' => '',
            'expires_in' => 0,
            'scope' => '',
            'created' => 0,
        ]);
    }
}
