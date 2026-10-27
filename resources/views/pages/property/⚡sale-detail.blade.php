<?php

use App\Livewire\Component;
use App\Models\Property;
use App\Services\PropertyService;
use Livewire\Attributes\Title;

new #[Title('Property For Sale')] class extends Component {
    public ?Property $property = null;

    public function mount(string $slug): void
    {
        $service = new PropertyService();
        $this->property = $service->saleDetail(slug: $slug);

        if (!$this->property) {
            abort(404);
        }

        $service->counter(property: $this->property);
    }

    public function rendering(): void
    {
        $this->property?->loadMissing(['area.district', 'district', 'image', 'images']);
    }
};
?>

@section('title', $property->name)

@php
    use App\Enums\Property\PropertyOwnershipType;

    $location = $property->area?->name ?? $property->district?->name;
    $isLeasehold = $property->ownership_type === PropertyOwnershipType::Leasehold;
    $isFreehold = $property->ownership_type === PropertyOwnershipType::Freehold;

    $leaseRemainingYears = null;
    if ($isLeasehold && $property->lease_expiry_date && $property->lease_expiry_date->isFuture()) {
        $leaseRemainingYears = (int) abs(now()->diffInYears($property->lease_expiry_date));
    }

    $tenure = null;
    if ($isLeasehold) {
        $tenure = $leaseRemainingYears
            ? strtoupper('Leasehold - '.$leaseRemainingYears.' years remaining')
            : 'LEASEHOLD';
    } elseif ($isFreehold) {
        $tenure = $property->land_title?->description()
            ? strtoupper('Freehold - '.$property->land_title->description())
            : 'FREEHOLD';
    }

    $headline = collect([
        $property->bedroom?->description() ? $property->bedroom->description().'-Bedroom' : null,
        $property->type?->description(),
        'for Sale',
        $location ? 'in '.$location : null,
        $property->ownership_type?->description() ? '- '.$property->ownership_type->description() : null,
    ])->filter()->implode(' ');

    $h1 = filled($property->name) ? $property->name : $headline;

    $faqs = [];
    if ($property->ownership_type?->description()) {
        $faqs['Is this property freehold or leasehold?'] = 'This property is offered as '.$property->ownership_type->description().'.';
    }
    if ($isLeasehold && $property->lease_expiry_date) {
        $faqs['What is the lease expiry date?'] = 'The lease expires on '.$property->lease_expiry_date->isoFormat('DD MMMM YYYY').'.';
    }
    if ($property->zoning) {
        $faqs['What is the zoning of this property?'] = 'The zoning is '.$property->zoning.'.';
    }
    if ($property->pbg_status?->description()) {
        $faqs['What is the PBG status?'] = 'The PBG status is '.$property->pbg_status->description().'.';
    }
    if ($property->slf_status?->description()) {
        $faqs['What is the SLF status?'] = 'The SLF status is '.$property->slf_status->description().'.';
    }
@endphp

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
                        <li class="breadcrumb-item">{{ $location }}</li>
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
                <div class="col-lg-7 col-xl-8">
                    <h2 class="h4 fw-semibold mb-3">Property details</h2>
                    <x-property.sale.details :property="$property" />

                    <hr class="my-4" />

                    <h2 class="h4 fw-semibold mb-3">About this property</h2>
                    <div class="text-body-secondary">
                        @if ($property->translate_description)
                            {!! $property->translate_description !!}
                        @else
                            <span class="fst-italic">
                                {{ trans('property.no_description_about_this_property') }}
                            </span>
                        @endif
                    </div>
                </div>

                <div class="col-lg-5 col-xl-4">
                    <div class="card card-body rounded-4 bg-success-subtle border-0">
                        <h2 class="h5 fw-semibold text-success-emphasis mb-3">Ownership &amp; legal information</h2>
                        <x-property.sale.legal :property="$property" />
                    </div>
                </div>
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
                <h2 class="h4 fw-semibold mb-3">{{ trans('property.nearby') }}</h2>
                <x-property.sale.location :property="$property" />
            </div>
        </section>
    @endif

    <section class="pb-5">
        <div class="container-md">
            <livewire:property.sale.enquiry :property-name="$property->name" :property-code="$property->code"
                wire:key="enquiry-{{ $property->id }}" />
        </div>
    </section>

    <section class="pb-5">
        <div class="container-md">
            <h2 class="h4 fw-semibold mb-4">Similar properties</h2>
            <x-property.sale.similar :property="$property" />
        </div>
    </section>

    <section class="pb-5">
        <div class="container-md">
            <div class="row g-5">
                <div class="col-lg-7">
                    <h2 class="h4 fw-semibold mb-3">{{ $property->name }} for sale in {{ $location ?? 'Bali' }}</h2>
                    <p class="text-body-secondary">
                        {{ $property->name }} is a
                        {{ $property->ownership_type?->description() ? Str::lower($property->ownership_type->description()).' ' : '' }}property
                        for sale{{ $location ? ' in '.$location : '' }}. Explore the full details above and contact our
                        team for pricing, availability and viewings.
                    </p>
                    <a draggable="false" class="btn btn-outline-success rounded-pill" href="{{ route('home') }}"
                        wire:navigate>
                        Back to home
                    </a>
                </div>

                @if (!empty($faqs))
                    <div class="col-lg-5">
                        <h2 class="h4 fw-semibold mb-3">Frequently asked questions</h2>
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
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'RealEstateListing',
            'name' => $property->name,
            'url' => route('property.sale.detail', ['slug' => $property->slug]),
            'image' => $property->image?->image_url,
            'offers' => [
                '@type' => 'Offer',
                'price' => $property->sale_price,
                'priceCurrency' => $property->currency?->name ?? 'IDR',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Home',
                    'item' => route('home'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => $property->name,
                    'item' => route('property.sale.detail', ['slug' => $property->slug]),
                ],
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endpush
