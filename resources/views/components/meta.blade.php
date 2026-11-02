@php
    $currentPath = trim(request()->path(), '/');
    $pathSegments = array_values(array_filter(explode('/', $currentPath)));

    if (isset($pathSegments[0]) && in_array($pathSegments[0], ['id', 'fr'], true)) {
        array_shift($pathSegments);
    }

    $basePath = implode('/', $pathSegments);

    $localeUrls = [
        'en' => url($basePath),
        'id' => url(trim('id/'.$basePath, '/')),
        'fr' => url(trim('fr/'.$basePath, '/')),
    ];

    $currentLocale = app()->getLocale();
    $canonicalUrl = $localeUrls[$currentLocale] ?? $localeUrls['en'];

    $query = request()->getQueryString();
    if ($query) {
        $canonicalUrl .= '?'.$query;
    }

    $metaDescription = trim($__env->yieldContent('meta_description', config('constants.meta.description')));
    $metaTitle = config('constants.meta.title');
@endphp

<base href="{{ config('app.url') }}" />
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
<meta name="description" content="{{ $metaDescription }}" />
<meta name="format-detection" content="telephone=no" />
<meta name="theme-color" content="{{ config('constants.color') }}" />
<meta name="color-scheme" content="light">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="robots" content="index, follow" />

<link rel="canonical" href="{{ $canonicalUrl }}" />
<link rel="alternate" hreflang="x-default" href="{{ $localeUrls['en'] }}" />
<link rel="alternate" hreflang="en" href="{{ $localeUrls['en'] }}" />
<link rel="alternate" hreflang="id" href="{{ $localeUrls['id'] }}" />
<link rel="alternate" hreflang="fr" href="{{ $localeUrls['fr'] }}" />

<meta property="og:site_name" content="{{ $metaTitle }}" />
<meta property="og:locale" content="{{ $currentLocale }}" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ $canonicalUrl }}" />
<meta property="og:description" content="{{ $metaDescription }}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="{{ $metaTitle }}" />
<meta name="twitter:description" content="{{ $metaDescription }}" />

<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon" />
