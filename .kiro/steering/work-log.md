# Work Log — SO Living Bali

A running record of important work and decisions, so a new Kiro session starts with full context. Newest at the top. Keep this updated and ship via push → PR → merge to `main`.

## Standing decisions (read these first)

- **Delivery flow**: every change goes diff → stage → push → PR → merge to `main`, straight through to merge (see `conventions.md`).
- **Public UI**: Bootstrap 5.3 only, no custom CSS classes/theme. The old "SLB" custom theme was reverted.
- **Nearby (for-sale page)**: derived from the property's existing `latitude`/`longitude` (keyless OpenStreetMap + Leaflet, with a keyless Overpass POI list that degrades gracefully). NOT manual CMS entry, NOT Google API key, NOT scraping.
- **Scope**: `so-living-bali` repo only.
- **Sandbox**: PHP can't run here; the user must run `php artisan migrate` / `php artisan test` / `./vendor/bin/pint` locally. After pulling CSS changes, hard-refresh the browser.

## Session (for-sale spec completion) — PRs #31, #32, #33, MERGED

- **PR #31 — SEO URL**: for-sale detail URL is now `/property-for-sale/{area}/{slug}` (owner confirmed singular `property-for-sale`). Old `/properties-for-sale/{slug}` 301-redirects to `/property-for-sale/bali/{slug}`. Added `Property::sale_url` + `sale_area_slug` accessors; all links (sale list, similar, breadcrumb, schema) use `sale_url`. `{area}` is cosmetic (resolve still by slug); `mount()` now accepts `{area}`; feature tests updated to pass area+slug. Breadcrumb area segment links to the for-sale list filtered by area/district.
- **PR #32 — Similar properties (spec §9)**: ranked by relevance (area 8 / district 4 / type 2 / ownership 2 / bedroom 1) over a pool of 50, top 4, instead of random. Ownership/tenure badge per card. Internal-link CTAs: `View more in {area}` (list filtered by area/district) + `View all properties for sale`.
- **PR #33 — SEO/Schema + FAQ + i18n**: dynamic meta description + OG tags via new `@stack('meta')` in layout head, generated from CMS data. JSON-LD enriched: RealEstateListing (description/bedrooms/bathrooms/address/floorSize/offer), BreadcrumbList matching the visual breadcrumb, new Organization schema, FAQPage schema (only when FAQ visible). Dynamic FAQ expanded (lease remaining/extension/zoning/PBG/SLF, each conditional). i18n'd Similar Properties + Frequently Asked Questions headings; bottom CTA → View all properties for sale. SEO contextual content (spec §10) satisfied by E1 = area description (PR #29) + internal links (PR #32), no new CMS field (owner's call).

### For-sale spec status — essentially complete
All 12 sections + SEO/AI/Schema + the 6-point client email are implemented. Remaining optional/owner-dependent: richer per-area SEO copy beyond the area description (deferred, E1 chosen); the `Living Area` / `Extension Period` optional columns (not added — only create if the owner wants those exact fields). The for-sale detail URL change needs `php artisan optimize:clear` on deploy (route cache).

## Session (area descriptions) — PRs #28, #29, MERGED (NOT migrated)

- **PR #28 — DB columns (NOT run)**: migrations `0001_01_01_400000_add_description_to_districts_table` and `0001_01_01_400001_add_description_to_areas_table` (sequential naming, no dates, per owner) add nullable TEXT `description`/`description_id`/`description_fr` after `name` on `districts` and `areas`. Models District+Area got fillable/casts/`$translatable` + `translate_description` accessor. Owner runs migrate/ALTER (owner-only). ALTER SQL handed over in chat.
- **PR #29 — CMS fields + display (point 4 a+b)**: (a) EN/ID/FR description textareas on district+area add/edit pages and their Form objects. (b) new `x-property.sale.area-description` shows the listing's area description (fallback district) on the for-sale detail page after Location, hidden when empty. Added `property.about_the_area`. DEPENDS on the #28 columns — will error if accessed before the owner runs the ALTER/migrate.

## Session (for-sale page client spec) — PRs #24, #25, #26, MERGED

Client sent a full Sales Property Page spec (EN/ID PDF) + a feedback email. Working through it step by step on the for-sale detail page (`pages/property/⚡sale-detail.blade.php` + `components/property/sale/*`). Core rule: **IF NO DATA → DO NOT DISPLAY** (field, label, section).

- **PR #24 — Gallery redesign**: 3-col grid; first cell = Video Tour + Floor Plan tiles (only when URLs exist), then up to 5 photos with +N More Images overlay; `View all photos (N)` pill. Added `property.view_all_photos`.
- **PR #25 — Hero**: dynamic breadcrumb `Home > Properties for Sale > {area/district} > {type}` (each segment conditional); SEO H1 (CMS name, else built from type/bedroom/location/ownership); prominent price + `IDR x.x Billion` subtitle; tenure badge `LEASEHOLD - N YEARS REMAINING` / `FREEHOLD - {SHM}`; key specs row; CTAs Request Information / Book a Viewing / WhatsApp. Added `property.request_information`, `property.book_a_viewing`.
- **PR #26 — Client email**: (1) Ownership added as a 5th key detail in hero (Bedrooms/Bathrooms/Building/Land/Ownership). (2) Section-level empty-hiding: Property Details heading, Ownership & Legal card (left col widens to full when legal hidden), About (removed no-description placeholder). (6) Confirmed lease-remaining is auto-calculated from `lease_expiry_date` vs `now()` and never exposes created/listing date. Added `property.ownership`, `about_this_property`, `ownership_and_legal_information`.

### Client email — status of the 6 points
1. Ownership 5th key detail → DONE (#26).
2. Empty sections hidden → DONE (#26) for Details/Legal/About; Highlights + Location already conditional.
3. Nearby automatic → already auto (keyless OSM/Overpass from lat/long), no manual input; keep testing reliability.
4. Area/Neighborhood descriptions in CMS → NOT YET. Needs a new column `description` (+ `description_id`/`description_fr`) on `districts` and `areas` (longtext/text, nullable), a CMS edit field for each, and auto-display on the property page by the listing's area→district fallback. This is a real CMS feature (not hardcode). Awaiting owner go-ahead on scope (districts + areas both).
5. FAQ at bottom → already present; to be made fully dynamic + FAQ schema in a later step.
6. Auto leasehold calc → already satisfied, no listing-date leak.

### DB columns still needed (from the spec) — for owner decision
- Area/neighborhood descriptions: add `description`/`description_id`/`description_fr` (text, nullable) to `districts` AND `areas` tables (point 4).
- Property Overview "Living Area": optional new column `living_area_size` (int, m²) on `properties` — currently not shown.
- Legal "Extension Period": optional new column `lease_extension_period` (string) on `properties` — only `lease_extension_available` + `lease_extension_terms_or_price` exist today.
- SEO Contextual Content (spec §10): needs a source — either a `seo_contents` table or per-area content; deferred.

## Session (header Properties dropdown) — PR #22, MERGED

- **PR #22 — Enable Properties dropdown in header**: Uncommented the `childrens` entries on the Properties item in `config/navigations.php` → header now shows a dropdown with For Rent (`property.index`) and For Sales (`property.properties-for-sale`). `components/layout/header.blade.php` already renders `childrens` as a dropdown (desktop) and collapsible group (mobile offcanvas) via `@isset`. Route + `index.for_rent`/`index.for_sales` translations (en/fr/id) already exist. Local: `php artisan optimize:clear` to reload cached config.

## Session (available_date field + 3-month window) — PR #20, MERGED

- **PR #20 — Single `available_date` field on property index + BETWEEN 3-month window (per owner spec)**: Owner's final spec: property.index uses ONE `available_date` form field (the search calendar date), passed to `properties()` → `PropertyService::index(availableDate: $this->available_date)`, filtering `availability_date BETWEEN availableDate AND availableDate + 3 months`. Example: pick 27 Oct 2026 → `BETWEEN 2026-10-27 AND 2027-01-27`. Changes: `pages/property/⚡index.blade.php` replaced `start_date`/`end_date` with one `available_date` (`#[Url]`, default today), passes `:available-date` to the list; `components/property/⚡list.blade.php` `startDate`/`endDate` → single `availableDate` (Reactive), calls `index(availableDate: ...)`; `components/property/⚡search.blade.php` renamed the calendar's `date` property to `available_date` (same `#[Url]` name as index so the selected date flows straight into the filter; `startDate`/`endDate` kept only for calendar highlight display); `PropertyService::index()` param `availabilityDate` → `availableDate`, filter is now `whereBetween`. CMS `startDate`/`endDate` logic untouched.
  - IMPORTANT behaviour note: this BETWEEN window means IP146 (availability 07 Jan 2027) WILL show when today is 27 Oct 2026, because 07 Jan 2027 ∈ [27 Oct 2026, 27 Jan 2027]. This is the owner's explicitly-requested "from selected date until 3 months later" rule, reversing the `<=` logic of PR #18. If IP146 must stay hidden, the rule would need to change again — flagged to owner.
  - Local steps: `php artisan optimize:clear`, hard-refresh `/property`. PHP/DB couldn't run in sandbox — needs local confirmation.

## Session (availability filter correction) — PR #18, MERGED

- **PR #18 — Availability filter direction fix (THE actual IP146 fix)**: PR #12 set the `availabilityDate` filter to `availability_date >= date AND <= date + 3 months` (a "available within the next 3 months" window). That was WRONG for IP146: its availability date is **07 Jan 2027**, today is 27 Oct 2026, and 07 Jan 2027 falls INSIDE the 27 Oct 2026 → 27 Jan 2027 window, so IP146 kept showing. Correct meaning: a property is only rentable once its availability date has **arrived**. Fix: filter `availability_date <= availabilityDate` (default today, or the visitor's selected move-in date). IP146 (`2027-01-07 <= 2026-10-27` = false) is now hidden by default and only appears when a move-in date on/after 07 Jan 2027 is selected. NULL `availability_date` rows are also hidden (NULL never satisfies `<=`), which is the intended "not yet available" behaviour. Removed the now-unused `Illuminate\Support\Carbon` import. `startDate`/`endDate` CMS logic still untouched.
  - Local steps: `php artisan optimize:clear`, hard-refresh `/property`. PHP/DB couldn't run in sandbox — needs local confirmation.

## Session (Property image lazy load) — PR #16, MERGED

- **PR #16 — Property `image`/`images` lazy loading on detail pages**: Same root cause as the Guide fix (PR #14), now for `Property`. Error: `Attempted to lazy load [image] on model [App\Models\Property]`. The property detail pages — public rental (`property/⚡detail.blade.php`), public sale (`property/⚡sale-detail.blade.php`), CMS (`cms/property/⚡detail.blade.php`) — hold `public Property $property` and only eager-loaded `image`/`images` in `mount()`. On any later Livewire request (sale page's `<livewire:property.sale.enquiry>` child, CMS `delete()` action, lazy children), Livewire re-hydrates `$property` by re-querying WITHOUT relations, so `components/property/images.blade.php` + `property/sale/gallery.blade.php` accessing `$property->image`/`$property->images` threw. Fix: (1) `protected $with = ['image'];` on the `Property` model (HasOne cover image always loaded cheaply everywhere — list/card components already loaded it); (2) moved relation eager-loading from `mount()` into a `rendering()` lifecycle hook on the three detail pages so `images` (HasMany) + `area`/`district`/`user`/`owner`/`ownerRepresentative` survive hydration WITHOUT forcing a HasMany on every Property query (keeps sitemap/exports/CMS lists lean). `$with` only carries the cheap HasOne; the heavier HasMany stays page-scoped via `rendering()`.
  - Note: the `rendering()` hook is Livewire 3's pre-render hook, runs on every request incl. after hydration; `loadMissing` is a no-op when already loaded. Pattern to reuse for any other page holding a `public <Model>` that renders a relation.
  - Local steps: `php artisan optimize:clear`, hard-refresh. PHP/DB couldn't run in sandbox — needs local confirmation.

## Session (Guide category lazy load) — PR #14, MERGED

- **PR #14 — Guide `category` lazy loading error on home/guide pages**: `Model::preventLazyLoading()` is on. Error: `Attempted to lazy load [category] on model [App\Models\Guide]`. The home guides section (`components/sections/⚡guides.blade.php`) and the guide index/detail pages render `category` (`$guide->category->translate_name` in `components/guide/content.blade.php`, `guide/⚡another.blade.php`). Services eager-load `category` on the initial `mount()`, but Livewire re-hydrates public **typed model properties** (`public Guide $guide`) by re-querying the model fresh **without** relations on subsequent requests (e.g. when the lazy `<livewire:guide.another />` child resolves and the parent re-renders), so `$guide->category` is unloaded and throws. Fix: declared `protected $with = ['category'];` on the `Guide` model so `category` is always eager-loaded on every query (including Livewire hydration). Existing `with(['category'])`/`loadMissing(['category'])` calls left untouched (now redundant but harmless) to keep the change minimal. First model in the repo to use `$with`.
  - Local steps: `php artisan optimize:clear`, hard-refresh. PHP/DB couldn't run in sandbox — needs local confirmation.

## Session (property.index availability) — PR #12, MERGED

- **PR #12 — Property index availability window (next 3 months) + single move-in date**: Client wants the public property list (`property.index`) to show properties available within the next 3 months (default today → +3 months), and from a visitor-selected move-in date → +3 months. Reported bug: IP146 (availability July 2027) still showed on the list. Root cause: the public list passed `startDate`/`endDate` (a ~1-month range derived from the picked date) into `PropertyService::index()`, and the intended 3-month default branch (`start==today && end==today`) never fired for the public page because the search component always sent non-today dates. Per the owner's explicit, risk-averse instruction ("just add a key to PropertyService index, availabilityDate, don't change the rest"), we did NOT touch the existing `startDate`/`endDate` logic (still used by CMS property + contact lists). Changes: (1) added a new `?string $availabilityDate` param to `PropertyService::index()` that filters `availability_date >= availabilityDate AND <= availabilityDate + 3 months` (imported `Illuminate\Support\Carbon`); (2) `components/property/⚡list.blade.php` now passes `availabilityDate: $this->startDate` instead of `startDate`/`endDate`; (3) removed the second (move-out) date display + date-range highlight from `components/search/when.blade.php` and `when-date-range.blade.php`, leaving a single highlighted move-in date. The `endDate` prop is still passed around (unused in the view now) and `⚡search.blade.php` was intentionally left unchanged to keep the diff minimal.
  - Local steps: `php artisan optimize:clear` (if caching), hard-refresh. Verify IP146 (July 2027) is hidden by default and only appears when a move-in date within 3 months of July 2027 is selected. PHP/DB couldn't be run in the sandbox — needs local confirmation.

## Session (currency fix → for-sale page) — PRs #1–#9, all MERGED

- **PR #9 — Rename for-sale URL**: changed the public URL from `/property-for-sale/{slug}` to `/properties-for-sale/{slug}` (plural). Route name `property.sale.detail` is unchanged, so all `route()` references keep working. After pulling, run `php artisan optimize:clear` if route caching is used. Old URL now 404s — consider a 301 redirect if the old URL was indexed/shared.
- **PR #8 — Kiro steering**: added `.kiro/steering/{project-overview,conventions,work-log}.md`.


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
