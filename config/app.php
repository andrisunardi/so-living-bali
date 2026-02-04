<?php

use Illuminate\Support\Facades\Facade;

return [

    'name' => env('APP_NAME', 'Laravel'),

    'env' => env('APP_ENV', 'production'),

    'debug' => (bool) env('APP_DEBUG', false),

    'url' => env('APP_URL', 'http://localhost'),

    'timezone' => 'UTC',

    'locale' => env('APP_LOCALE', 'en'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

    'aliases' => Facade::defaultAliases()->merge([
        'PropertyBedroom' => App\Enums\Property\PropertyBedroom::class,
        'PropertyLivingStyle' => App\Enums\Property\PropertyLivingStyle::class,
        'PropertyOrientation' => App\Enums\Property\PropertyOrientation::class,
        'PropertyPowerBackup' => App\Enums\Property\PropertyPowerBackup::class,
        'PropertyPriceFlexibility' => App\Enums\Property\PropertyPriceFlexibility::class,
        'PropertyRentalType' => App\Enums\Property\PropertyRentalType::class,
        'PropertyType' => App\Enums\Property\PropertyType::class,

        'Excel' => Maatwebsite\Excel\Facades\Excel::class,
        'Menu' => Spatie\Menu\Laravel\Facades\Menu::class,
        'PDF' => Barryvdh\DomPDF\Facade\Pdf::class,
        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
        'QrCode' => SimpleSoftwareIO\QrCode\Facades\QrCode::class,
        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
    ])->toArray(),

];
