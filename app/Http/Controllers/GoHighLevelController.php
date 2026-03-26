<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GoHighLevelController extends Controller
{
    public function oauth(Request $request)
    {
        $code = $request->query('code');

        $response = Http::post(config('constants.ghl.app_url'), [
            'client_id' => config('constants.ghl.client_id'),
            'client_secret' => config('constants.ghl.client_secret'),
            'grant_type' => config('constants.ghl.grant_type'),
            'code' => $code,
            'redirect_uri' => config('constants.ghl.redirect_uri'),
            'user_type' => config('constants.ghl.user_type'),
        ]);

        $data = $response->json();

        return response()->json($data);
    }
}
