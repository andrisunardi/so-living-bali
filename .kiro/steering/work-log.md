# Work Log — SO Living Bali

A running record of important work and decisions, so a new Kiro session starts with full context. Newest at the top. Keep this updated and ship via push → PR → merge to `main`.

## Standing decisions (read these first)

- **Delivery flow**: every change goes diff → stage → push → PR → merge to `main`, straight through to merge (see `conventions.md`).
- **Public UI**: Bootstrap 5.3 only, no custom CSS classes/theme. The old "SLB" custom theme was reverted.
- **Nearby (for-sale page)**: derived from the property's existing `latitude`/`longitude` (keyless OpenStreetMap + Leaflet, with a keyless Overpass POI list that degrades gracefully). NOT manual CMS entry, NOT Google API key, NOT scraping.
- **Scope**: `so-living-bali` repo only.
- **Sandbox**: PHP can't run here; the user must run `php artisan migrate` / `php artisan test` / `./vendor/bin/pint` locally. After pulling CSS changes, hard-refresh the browser.

## Session (currency fix → for-sale page) — PRs #1–#7, all MERGED

- **PR #1 — Currency conversion (EUR/USD)**: `Str::currency` was assuming every stored price was IDR. Made it currency-aware (normalize via IDR using cached rates, respects the property's own `PropertyCurrency`), safe fallbacks (no bogus number / no `UnhandledMatchError`), validated the `currency/{currency}` route, hardened `ExchangeRateRefreshCurrency`, fixed a dangling `scopeCurrencyOther` (renamed to `scopeEur`). Added `tests/Unit/CurrencyMacroTest.php`.
- **PR #2 — Lazy loading error on property detail**: `Model::preventLazyLoading()` is on; the detail page accessed `images` (HasMany) and `district` (direct BelongsTo) that weren't eager-loaded. Added them to `loadMissing(['area.district', 'district', 'image', 'images'])`.
- **PR #3 — 504 timeout on CMS property edit**: `PropertyEditForm::set()` called `get_headers()` + `getimagesize()` against each image URL (which points to our own asset server), causing many blocking HTTP round trips (30 images → timeout). Now reads width/height/size from the LOCAL file via `ASSETS_PATH`/`ASSETS_URL` mapping (strip `ASSETS_URL` prefix before joining `ASSETS_PATH`), cached per image. Documented `ASSETS_PATH`/`ASSETS_URL` in `.env.example`.
- **PR #4 — Property list price by rental type**: the list page showed monthly/yearly price based on whether the price column was non-empty, so a stale `monthly_price` still showed after rental type changed (IP160). Gated list prices by `rental_type` (Both/Monthly, Both/Yearly) to match the detail sidebar.
- **PR #5 — For-sale property detail page**: new `/property-for-sale/{slug}` (`property.sale.detail`), `PropertyService::saleDetail()`, Volt page + `components/property/sale/*`, feature tests. (Initial design later reworked — see #6/#7.)
- **PR #6 — Add fields + design fixes**: added `video_tour` (string URL), `floor_plan` (string URL), `highlights` (json array) end-to-end (migration + model + CMS + display); initial design tweaks. (The manual `nearby` {place,time} added here was later removed in #7.)
- **PR #7 — Revert custom CSS + Bootstrap 5.3 redesign + nearby via lat/long**: removed all custom "SLB" CSS from `public/css/app.css` (back to baseline, 0 `slb-`); rebuilt all `sale/*` views with stock Bootstrap 5.3 (ratio-constrained gallery tiles + modal lightbox, ratio-constrained similar cards, green `card text-bg-success` enquiry form, price card, badges, `fixed-bottom` sticky CTA); removed the manual `nearby` field (new drop migration `2026_10_28_000000_drop_nearby_from_properties_table`) and replaced the on-page nearby with a lat/long-driven keyless OSM/Leaflet map + Overpass POI list. Kept `video_tour`/`floor_plan`/`highlights`.

### Known follow-ups / notes
- `floor_plan` is stored as a nullable URL (no file upload) — can switch to upload later if needed.
- id/fr translations for the new fields are English fallbacks pending a translator pass.
- The Overpass POI fetch has no abort-timeout/429 handling yet (fails closed). Optional hardening later.
- For-sale page fields with no backing column were intentionally omitted (not faked): `videoUrl`/`floorPlan` existed only as URLs, and there is no DB-backed per-POI "nearby" list anymore.
