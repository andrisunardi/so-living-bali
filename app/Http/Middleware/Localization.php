<?php

namespace App\Http\Middleware;

use App\Enums\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale');

        if (! Language::tryFrom((string) $locale)) {
            $locale = config('app.locale');
        }

        App::setlocale($locale);

        $prefix = $locale === config('app.locale') ? null : $locale;
        URL::defaults(['locale' => $prefix]);

        return $next($request);
    }
}
