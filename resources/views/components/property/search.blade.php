@props([
    'area' => '',
    'districts' => [],
    'areas' => [],
    'types' => [],
    'ownership' => null,
    'prices' => [],
    'price_min' => 0,
    'price_max' => 0,
])

<section class="translate-middle-y">
    <div class="container-md">
        <div class="card card-body border-0 shadow rounded-4 p-3 p-md-4 bg-white">
            <div class="row g-3 align-items-end">
                <div class="col-sm-6 col-xl-3">
                    {{-- prettier-ignore --}}
                    <x-search.area
                    :area="$area"
                    :districts="$districts"
                    :areas="$areas"
                    :list-districts="$this->districts()"
                    />
                </div>

                <div class="col-sm-6 col-xl-2">
                    <x-search.type :types="$types" />
                </div>

                <div class="col-sm col-xl-2">
                    <x-search.ownership :ownership="$ownership" />
                </div>

                <div class="col-sm col-xl-3">
                    {{-- prettier-ignore --}}
                    <x-search.price
                    :prices="$prices"
                    :price-min="$priceMin"
                    :price-max="$priceMax"
                    />
                </div>

                <div class="col-sm col-xl-2">
                    {{-- prettier-ignore --}}
                    <x-search.button-sale
                    :districts="$districts"
                    :areas="$areas"
                    :types="$types"
                    :ownership="$ownership"
                    :prices="$prices"
                    />
                </div>
            </div>
        </div>
    </div>
</section>
