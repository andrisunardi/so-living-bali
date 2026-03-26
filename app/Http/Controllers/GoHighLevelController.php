<?php

namespace App\Http\Controllers;

use App\Models\Oauth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoHighLevelController extends Controller
{
    public function oauth(Request $request)
    {
        $code = $request->query('code');

        $response = Http::post(config('constants.ghl.oauth_url'), [
            'client_id' => config('constants.ghl.client_id'),
            'client_secret' => config('constants.ghl.client_secret'),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => config('constants.ghl.redirect_uri'),
            'user_type' => config('constants.ghl.user_type'),
        ]);

        $data = $response->json();

        if (isset($data['error'])) {
            abort(400);
        }

        $oauth = Oauth::firstOrCreate(['code' => 'GOHIGHLEVEL']);
        $oauth->refresh_token = $data['refresh_token'];
        $oauth->access_token = $data['access_token'];
        $oauth->token_type = $data['token_type'];
        $oauth->expires_in = $data['expires_in'];
        $oauth->scope = $data['scope'];
        $oauth->created = $data['created'];
        $oauth->save();

        session()->flash('success', [
            'title' => trans('index.connect') . ' ' . trans('index.success'),
            'message' => trans('page.oauth') . ' ' . trans('message.has_been_successfully_connected'),
        ]);

        return redirect()->route('cms.home');
    }

    public function refresh()
    {
        $oauth = Oauth::firstOrCreate(['code' => 'GOHIGHLEVEL']);

        $response = Http::post(config('constants.ghl.oauth_url'), [
            'client_id' => config('constants.ghl.client_id'),
            'client_secret' => config('constants.ghl.client_secret'),
            'grant_type' => 'refresh_token',
            'refresh_token' => $oauth->refresh_token,
            'user_type' => config('constants.ghl.user_type'),
            'redirect_uri' => config('constants.ghl.redirect_uri'),
        ]);

        dd($oauth, $response);

        $data = $response->json();

        if (isset($data['error'])) {
            abort(400);
        }

        $oauth = Oauth::where('code', 'GOHIGHLEVEL')->firstOrFail();
        $oauth->refresh_token = $data['refresh_token'];
        $oauth->access_token = $data['access_token'];
        $oauth->token_type = $data['token_type'];
        $oauth->expires_in = $data['expires_in'];
        $oauth->scope = $data['scope'];
        $oauth->save();

        return redirect()->route('cms.home');
    }
}
