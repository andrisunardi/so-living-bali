# Project Overview — SO Living Bali

SO Living Bali is a Laravel real-estate platform for long-stay (monthly/yearly rental) and for-sale properties in Bali, with a public website and a CMS.

## Tech stack

- **Framework**: Laravel (PHP)
- **Frontend (public site)**: Livewire + Volt single-file components. Volt/component files use a leading `⚡` (lightning-bolt) character in their filename (e.g. `⚡detail.blade.php`).
- **UI / CSS**: Bootstrap 5.3 + Font Awesome. The public site uses stock Bootstrap 5.3 utilities and components. Do NOT introduce custom CSS classes or a bespoke theme for the public site — the owner explicitly wants pure Bootstrap 5.3 best practice.
- **Build**: Vite. NOTE: the public layout `resources/views/layouts/app.blade.php` loads CSS via `<link href="{{ asset('css/app.css') }}">` — i.e. the static file `public/css/app.css`. The `@vite(...)` line is commented out. Editing `public/css/app.css` does NOT require `npm run build`.
- **Maps**: Leaflet + OpenStreetMap (keyless). An Overpass API (keyless) call is used client-side for nearby POIs. No Google Maps API key is used for nearby.
- **Database**: MySQL-style migrations under `database/migrations`.

## Key domain concepts

- `App\Models\Property` — central model. Rental fields (`rental_type`, `monthly_price`, `yearly_price`, inclusions) and sale fields (`sale_price`, `currency`, `ownership_type`, lease fields, `zoning`, `pbg_status`, `slf_status`, `road_access`, `developer_name`, `video_tour`, `floor_plan`, `highlights`). Has `latitude`/`longitude` for maps. Relations: `area`, `district`, `image` (HasOne), `images` (HasMany), `owner`/`ownerRepresentative`.
- Enums under `app/Enums/Property/*` (PropertyRentalType, PropertyListingType, PropertyStatus, PropertyCurrency, PropertyOwnershipType, etc.) and `app/Enums/Currency.php`.
- Published/visible statuses: `PropertyStatus::AcceptUpper` and `AcceptPremium`.
- `App\Services\PropertyService` — query/detail/counter/create/update logic.

## Public pages

- Rental detail: `/property/{slug}` → `pages::property.detail`.
- For-sale detail: `/property-for-sale/{area}/{slug}` → route name `property.sale.detail` → `pages::property.sale-detail`. `{area}` is a cosmetic SEO segment; resolution is by `{slug}`. Old `/properties-for-sale/{slug}` 301-redirects here. Same foundation as rental detail (resolve slug → fetch property → 404), different (Bootstrap 5.3) design. Service gate: `PropertyService::saleDetail()` (published statuses + sale listing types).

## Price / currency

- Blade macro `Str::currency($amount, ?PropertyCurrency $from)` (in `app/Providers/AppServiceProvider.php`) converts a stored price to the visitor's selected currency (session `currency`) using cached IDR-based rates. Also `Str::idr()`, `Str::thousand()`.
- Rates are refreshed by the scheduled command `exchange-rate:refresh-currency` (needs `EXCHANGE_RATE_URL` + `EXCHANGE_RATE_TOKEN` in env and a persistent cache driver).

## Important environment variables

- `ASSETS_PATH` (e.g. `/home/solivingbali/assets`) and `ASSETS_URL` (e.g. `/assets`) — property image files live on the app's own asset disk; `image_url` is built from these. Read image metadata (width/height/size) from the local file via these, NOT via HTTP to the URL.
- `EXCHANGE_RATE_URL`, `EXCHANGE_RATE_TOKEN` — currency conversion.
