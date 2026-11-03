<?php

use App\Enums\Property\PropertyOwnershipType;
use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;

new #[Title('Property For Sale')] class extends Component
{
    public ?Property $property = null;

    public string $location = '';

    public bool $isLeasehold = false;

    public bool $isFreehold = false;

    public ?int $leaseRemainingYears = null;

    public ?string $tenure = null;

    public string $headline = '';

    public string $h1 = '';

    public bool $hasDetails = false;

    public bool $hasLegal = false;

    public array $faqs = [];

    public array $nearby = [];

    public string $metaDescription = '';

    public function mount(string $area, string $slug): void
    {
        $service = new PropertyService;
        $this->property = $service->saleDetail(slug: $slug);

        if (! $this->property) {
            abort(404);
        }

        $service->counter(property: $this->property);

        $this->property->loadMissing(['area.district', 'district', 'image', 'images']);

        $this->buildViewData($service);
    }

    protected function buildViewData(PropertyService $service): void
    {
        $property = $this->property;

        $this->location = $property->area?->name ?? $property->district?->name ?? '';
        $this->isLeasehold = $property->ownership_type === PropertyOwnershipType::Leasehold;
        $this->isFreehold = $property->ownership_type === PropertyOwnershipType::Freehold;

        if ($this->isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
            $this->leaseRemainingYears = (int) abs(now()->diffInYears($property->lease_expiry_date));
        }

        $this->tenure = $this->resolveTenure();
        $this->headline = $this->resolveHeadline();
        $this->h1 = filled($property->name) ? $property->name : $this->headline;
        $this->hasDetails = $this->resolveHasDetails();
        $this->hasLegal = $this->resolveHasLegal();
        $this->faqs = $this->resolveFaqs();
        $this->nearby = $service->nearby($property);
        $this->metaDescription = $this->resolveMetaDescription();
    }

    protected function resolveTenure(): ?string
    {
        if ($this->isLeasehold) {
            return $this->leaseRemainingYears
                ? strtoupper('Leasehold - '.$this->leaseRemainingYears.' years remaining')
                : 'LEASEHOLD';
        }

        if ($this->isFreehold) {
            return $this->property->land_title?->description()
                ? strtoupper('Freehold - '.$this->property->land_title->description())
                : 'FREEHOLD';
        }

        return null;
    }

    protected function resolveHeadline(): string
    {
        $property = $this->property;

        return collect([
            $property->bedroom?->description() ? $property->bedroom->description().'-Bedroom' : null,
            $property->type?->description(),
            'for Sale',
            $this->location ? 'in '.$this->location : null,
            $property->ownership_type?->description() ? '- '.$property->ownership_type->description() : null,
        ])->filter()->implode(' ');
    }

    protected function resolveHasDetails(): bool
    {
        $property = $this->property;

        return collect([
            $property->type?->description(),
            $property->ownership_type?->description(),
            $property->lease_expiry_date,
            $property->lease_extension_available?->description(),
            $property->bedroom?->description(),
            $property->number_of_bathrooms,
            $property->land_size,
            $property->building_size,
            $property->outdoor_area_size,
            $property->year_built,
            $property->fully_furnished ? true : null,
            $property->pool_size,
            $property->car_access ? true : null,
            $property->code,
        ])->filter()->isNotEmpty();
    }

    protected function resolveHasLegal(): bool
    {
        $property = $this->property;

        return collect([
            $this->isLeasehold ? $property->lease_expiry_date : null,
            $this->isLeasehold ? $property->lease_extension_available?->description() : null,
            $this->isLeasehold ? $property->lease_extension_terms_or_price : null,
            $this->isFreehold ? $property->land_title?->description() : null,
            $this->isFreehold && $property->land_certificate ? true : null,
            $property->zoning,
            $property->pbg_status?->description(),
            $property->slf_status?->description(),
            $property->road_access?->description(),
        ])->filter()->isNotEmpty();
    }

    protected function resolveFaqs(): array
    {
        $property = $this->property;
        $faqs = [];

        if ($property->ownership_type?->description()) {
            $faqs['Is this property freehold or leasehold?'] = 'This property is offered as '.$property->ownership_type->description().'.';
        }

        if ($this->isLeasehold && $property->lease_expiry_date) {
            $faqs['What is the lease expiry date?'] = 'The lease expires on '.$property->lease_expiry_date->isoFormat('DD MMMM YYYY').'.';
        }

        if ($this->isLeasehold && $this->leaseRemainingYears) {
            $faqs['How many years are left on the lease?'] = 'There are approximately '.$this->leaseRemainingYears.' years remaining on the lease.';
        }

        if ($this->isLeasehold && $property->lease_extension_available?->description()) {
            $faqs['Can the lease be extended?'] = 'Lease extension: '.$property->lease_extension_available->description().'.';
        }

        if ($property->zoning) {
            $faqs['What is the zoning of this property?'] = 'The zoning is '.Str::of($property->zoning)->stripTags()->trim().'.';
        }

        if ($property->pbg_status?->description()) {
            $faqs['Does it have a PBG?'] = 'The PBG status is '.$property->pbg_status->description().'.';
        }

        if ($property->slf_status?->description()) {
            $faqs['Does it have an SLF?'] = 'The SLF status is '.$property->slf_status->description().'.';
        }

        return $faqs;
    }

    protected function resolveMetaDescription(): string
    {
        $property = $this->property;

        $description = collect([
            $this->h1.'.',
            $property->sale_price > 0 ? 'Price '.Str::currency($property->sale_price, $property->currency).'.' : null,
            $this->tenure ? Str::of($this->tenure)->lower()->ucfirst().'.' : null,
            collect([
                $property->bedroom?->description() ? $property->bedroom->description().' bedrooms' : null,
                $property->number_of_bathrooms ? $property->number_of_bathrooms.' bathrooms' : null,
                $property->building_size ? $property->building_size.' m² building' : null,
                $property->land_size ? $property->land_size.' m² land' : null,
            ])->filter()->implode(', ').'.',
        ])->filter()->implode(' ');

        return Str::limit(trim(preg_replace('/\s+/', ' ', $description)), 160);
    }

    public function rendering(): void
    {
        $this->property?->loadMissing(['area.district', 'district', 'image', 'images']);
    }

    public function listingSchema(): array
    {
        $property = $this->property;

        return array_filter([
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateListing',
            'name' => $this->h1,
            'url' => $property->sale_url,
            'image' => $property->image?->image_url,
            'description' => $this->metaDescription,
            'numberOfBedrooms' => $property->bedroom?->description(),
            'numberOfBathroomsTotal' => $property->number_of_bathrooms,
            'address' => array_filter([
                '@type' => 'PostalAddress',
                'addressLocality' => $this->location,
                'addressRegion' => 'Bali',
                'addressCountry' => 'ID',
            ]),
            'floorSize' => $property->building_size ? [
                '@type' => 'QuantitativeValue',
                'value' => $property->building_size,
                'unitCode' => 'MTK',
            ] : null,
            'offers' => [
                '@type' => 'Offer',
                'price' => $property->sale_price,
                'priceCurrency' => $property->currency?->name ?? 'IDR',
                'availability' => 'https://schema.org/InStock',
            ],
        ], fn ($value) => filled($value));
    }

    public function breadcrumbSchema(): array
    {
        $property = $this->property;

        $items = collect([
            ['name' => trans('page.home'), 'item' => route('home')],
            ['name' => trans('page.properties_for_sale'), 'item' => route('property.properties-for-sale')],
            $this->location ? ['name' => $this->location, 'item' => $property->sale_url] : null,
            $property->type?->description() ? ['name' => $property->type->description(), 'item' => $property->sale_url] : null,
        ])->filter()->values()->map(fn ($item, $index) => [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item['name'],
            'item' => $item['item'],
        ])->all();

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        ];
    }

    public function organizationSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => config('constants.meta.title'),
            'url' => config('app.url'),
            'logo' => asset('images/logo.png'),
        ];
    }

    public function faqSchema(): ?array
    {
        if (empty($this->faqs)) {
            return null;
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => collect($this->faqs)->map(fn ($answer, $question) => [
                '@type' => 'Question',
                'name' => $question,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $answer,
                ],
            ])->values()->all(),
        ];
    }
};
?>

@section('title', $property->name)
@section('meta_description', $metaDescription)

@push('meta')
    <meta property="og:title" content="{{ $h1 }}">
    <meta property="og:description" content="{{ $metaDescription }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $property->sale_url }}">
    @if ($property->image?->image_url)
        <meta property="og:image" content="{{ $property->image->image_url }}">
    @endif
@endpush

<div class="pb-5">
    <section class="pt-4 pt-lg-4">
        <div class="container-md">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb small mb-0">
                    <li class="breadcrumb-item">
                        <a class="link-success text-decoration-none" href="{{ route('home') }}" wire:navigate>Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a class="link-success text-decoration-none" href="{{ route('property.properties-for-sale') }}"
                            wire:navigate>Properties for Sale</a>
                    </li>
                    @if ($location)
                        <li class="breadcrumb-item">
                            @if ($property->area)
                                <a class="link-success text-decoration-none"
                                    href="{{ route('property.properties-for-sale', ['areas' => [$property->area->id]]) }}"
                                    wire:navigate>{{ $location }}</a>
                            @elseif ($property->district)
                                <a class="link-success text-decoration-none"
                                    href="{{ route('property.properties-for-sale', ['districts' => [$property->district->id]]) }}"
                                    wire:navigate>{{ $location }}</a>
                            @else
                                {{ $location }}
                            @endif
                        </li>
                    @endif
                    @if ($property->type?->description())
                        <li class="breadcrumb-item active" aria-current="page">{{ $property->type->description() }}</li>
                    @endif
                </ol>
            </nav>
        </div>
    </section>

    <section class="pt-3">
        <div class="container-md">
            <x-property.sale.gallery :property="$property" />
        </div>
    </section>

    <section class="py-5">
        <div class="container-md">
            <h1 class="fw-semibold mb-4">{{ $h1 }}</h1>
            <x-property.sale.hero :property="$property" />
        </div>
    </section>

    <section class="pb-5">
        <div class="container-md">
            <div class="row g-5">
                <div class="{{ $hasLegal ? 'col-lg-7 col-xl-8' : 'col-12' }}">
                    @if ($hasDetails)
                        <h2 class="h4 fw-semibold mb-3">{{ trans('property.property_details') }}</h2>
                        <x-property.sale.details :property="$property" />

                        <hr class="my-4" />
                    @endif

                    @if ($property->translate_description)
                        <h2 class="h4 fw-semibold mb-3">{{ trans('property.about_this_property') }}</h2>
                        <div class="text-body-secondary">
                            {!! $property->translate_description !!}
                        </div>
                    @endif
                </div>

                @if ($hasLegal)
                    <div class="col-lg-5 col-xl-4">
                        <div class="card card-body rounded-4 bg-success-subtle border-0">
                            <h2 class="h5 fw-semibold text-success-emphasis mb-3">{{ trans('property.ownership_and_legal_information') }}</h2>
                            <x-property.sale.legal :property="$property" />
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    @if (filled($property->highlights))
        <section class="pb-5">
            <div class="container-md">
                <div class="rounded-4 p-4 p-lg-5 bg-body-tertiary">
                    <h2 class="h4 fw-semibold mb-4">{{ trans('property.why_this_property_stands_out') }}</h2>
                    <div class="row g-4">
                        @foreach ($property->highlights as $highlight)
                            <div class="col-md-6 col-lg-4">
                                <div class="d-flex gap-3">
                                    <span class="badge rounded-pill text-bg-success fs-6">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                                    <span>{{ $highlight }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($property->latitude && $property->longitude)
        <section class="pb-5">
            <div class="container-md">
                <h2 class="h4 fw-semibold mb-3">
                    {{ $location ? trans('property.location').' - '.$location.', Bali' : trans('property.nearby') }}
                </h2>
                <x-property.sale.location :property="$property" :nearby="$nearby" />
            </div>
        </section>
    @endif

    <x-property.sale.area-description :property="$property" />

    <section class="pb-5">
        <div class="container-md">
            <livewire:property.sale.enquiry :property-name="$property->name" :property-code="$property->code"
                wire:key="enquiry-{{ $property->id }}" />
        </div>
    </section>

    <section class="pb-5">
        <div class="container-md">
            <h2 class="h4 fw-semibold mb-4">{{ trans('property.similar_properties') }}</h2>
            <x-property.sale.similar :property="$property" />
        </div>
    </section>

    <section class="pb-5">
        <div class="container-md">
            <div class="row g-5">
                <div class="{{ ! empty($faqs) ? 'col-lg-7' : 'col-12' }}">
                    <h2 class="h4 fw-semibold mb-3">{{ $h1 }}</h2>
                    <p class="text-body-secondary">
                        {{ $property->name }} is a
                        {{ $property->ownership_type?->description() ? Str::lower($property->ownership_type->description()).' ' : '' }}property
                        for sale{{ $location ? ' in '.$location : '' }}. Explore the full details above and contact our
                        team for pricing, availability and viewings.
                    </p>
                    <a draggable="false" class="btn btn-outline-success rounded-pill"
                        href="{{ route('property.properties-for-sale') }}" wire:navigate>
                        {{ trans('property.view_all_properties_for_sale') }}
                    </a>
                </div>

                @if (! empty($faqs))
                    <div class="col-lg-5">
                        <h2 class="h4 fw-semibold mb-3">{{ trans('property.frequently_asked_questions') }}</h2>
                        <div class="accordion" id="sale-faq">
                            @foreach ($faqs as $question => $answer)
                                <div class="accordion-item">
                                    <h3 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq-{{ $loop->index }}">
                                            {{ $question }}
                                        </button>
                                    </h3>
                                    <div id="faq-{{ $loop->index }}" class="accordion-collapse collapse"
                                        data-bs-parent="#sale-faq">
                                        <div class="accordion-body text-body-secondary">{{ $answer }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <x-property.sale.sticky-cta :property="$property" />
</div>

@push('script')
    <script type="application/ld+json">
        {!! json_encode($this->listingSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($this->breadcrumbSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode($this->organizationSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    @if ($this->faqSchema())
        <script type="application/ld+json">
            {!! json_encode($this->faqSchema(), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>
    @endif
@endpush
