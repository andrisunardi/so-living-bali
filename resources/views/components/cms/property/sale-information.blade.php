<div class="row g-3 mb-3">
    <div class="col-sm-6">
        <label class="form-label" for="currency">
            {{ trans('property.currency') }}
        </label>
        <div>
            @foreach (PropertyCurrency::cases() as $propertyCurrency)
                <div class="form-check form-check-inline" wire:key="currency-{{ $propertyCurrency->value }}">
                    <input class="form-check-input" type="radio" id="currency_{{ $propertyCurrency->value }}"
                        name="currency" value="{{ $propertyCurrency->value }}"
                        {{ $propertyCurrency->value == $form->currency ? 'checked' : '' }}
                        wire:model.lazy="form.currency" wire:offline.class="disabled" wire:offline.attr="disabled"
                        wire:loading.class="disabled" wire:loading.attr="disabled">
                    <label class="form-check-label" for="currency_{{ $propertyCurrency->value }}">
                        {{ $propertyCurrency->name }}
                    </label>
                </div>
            @endforeach
        </div>
        @error('form.currency')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    @if ($form->listing_type != PropertyListingType::ForRent->value)
        <div class="col-12">
            <div class="alert alert-light border mb-0">
                {{ trans('property.ownership_options_helper') }}
            </div>
        </div>

        <div class="col-sm-6">
            <label class="form-label" for="has_leasehold">
                {{ trans('index.leasehold') }}
            </label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="has_leasehold"
                    name="has_leasehold" value="1" {{ $form->has_leasehold ? 'checked' : '' }}
                    wire:model.lazy="form.has_leasehold" wire:offline.class="disabled" wire:offline.attr="disabled"
                    wire:loading.class="disabled" wire:loading.attr="disabled">
                <label class="form-check-label text-{{ $form->has_leasehold ? 'success' : 'danger' }}"
                    for="has_leasehold">
                    {{ $form->has_leasehold ? trans('index.yes') : trans('index.no') }}
                </label>
            </div>
            @error('form.has_leasehold')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-sm-6">
            <label class="form-label" for="has_freehold">
                {{ trans('index.freehold') }}
            </label>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="has_freehold"
                    name="has_freehold" value="1" {{ $form->has_freehold ? 'checked' : '' }}
                    wire:model.lazy="form.has_freehold" wire:offline.class="disabled" wire:offline.attr="disabled"
                    wire:loading.class="disabled" wire:loading.attr="disabled">
                <label class="form-check-label text-{{ $form->has_freehold ? 'success' : 'danger' }}"
                    for="has_freehold">
                    {{ $form->has_freehold ? trans('index.yes') : trans('index.no') }}
                </label>
            </div>
            @error('form.has_freehold')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif

    @if ($form->listing_type != PropertyListingType::ForRent->value && $form->has_leasehold)
        <div class="col-12">
            <div class="card border">
                <div class="card-header text-bg-secondary">
                    <span class="fas fa-file-signature fa-fw"></span>
                    {{ trans('index.leasehold') }}
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="leasehold_price">
                                {{ trans('property.leasehold_price') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <span class="{{ PropertyCurrency::from($form->currency ?? 1)->icon() }} fa-fw "></span>
                                </div>
                                <input type="number" class="form-control" id="leasehold_price" name="leasehold_price"
                                    min="0" max="100000000000" placeholder="{{ trans('index.ex') }}"
                                    wire:model="form.leasehold_price" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                            </div>
                            <div class="form-text">
                                {{ trans('helper.required') }},
                                {{ trans('helper.min') }} : 0,
                                {{ trans('helper.max') }} : 100.000.000.000
                            </div>
                            @error('form.leasehold_price')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="lease_expiry_date">
                                {{ trans('property.lease_expiry_date') }}
                                <span class="text-danger">*</span>
                            </label>
                            <x-form.datepicker model="form.lease_expiry_date" id="lease_expiry_date"
                                min="{{ $property?->lease_expiry_date?->toDateString() ?? now()->toDateString() }}"
                                max="2099-12-31" />
                            <div class="form-text">
                                {{ trans('helper.min') }} : {{ trans('index.today') }},
                                {{ trans('helper.max') }} :
                                {{ Date::parse('2099-12-31')->isoFormat('DD MMMM YYYY') }}
                            </div>
                            @error('form.lease_expiry_date')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="lease_extension_available">
                                {{ trans('property.lease_extension_available') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div>
                                @foreach (PropertyLeaseExtensionAvailable::cases() as $propertyLeaseExtensionAvailable)
                                    <div class="form-check form-check-inline"
                                        wire:key="lease-extension-available-{{ $propertyLeaseExtensionAvailable->value }}">
                                        <input class="form-check-input" type="radio"
                                            id="lease_extension_available_{{ $propertyLeaseExtensionAvailable->value }}"
                                            name="lease_extension_available"
                                            value="{{ $propertyLeaseExtensionAvailable->value }}"
                                            {{ $propertyLeaseExtensionAvailable->value == $form->lease_extension_available ? 'checked' : '' }}
                                            wire:model.lazy="form.lease_extension_available"
                                            wire:offline.class="disabled" wire:offline.attr="disabled"
                                            wire:loading.class="disabled" wire:loading.attr="disabled">
                                        <label class="form-check-label"
                                            for="lease_extension_available_{{ $propertyLeaseExtensionAvailable->value }}">
                                            {{ Str::headline($propertyLeaseExtensionAvailable->name) }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            @error('form.lease_extension_available')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label" for="lease_extension_terms_or_price">
                                {{ trans('validation.attributes.lease_extension_terms_or_price') }}
                            </label>
                            <x-form.trix model="form.lease_extension_terms_or_price" />
                            <div class="form-text">
                                {{ trans('helper.minlength') }} : 1,
                                {{ trans('helper.maxlength') }} : 65.535,
                            </div>
                            @error('form.lease_extension_terms_or_price')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($form->listing_type != PropertyListingType::ForRent->value && $form->has_freehold)
        <div class="col-12">
            <div class="card border">
                <div class="card-header text-bg-secondary">
                    <span class="fas fa-landmark fa-fw"></span>
                    {{ trans('index.freehold') }}
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label" for="freehold_price">
                                {{ trans('property.freehold_price') }}
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <span class="{{ PropertyCurrency::from($form->currency ?? 1)->icon() }} fa-fw "></span>
                                </div>
                                <input type="number" class="form-control" id="freehold_price" name="freehold_price"
                                    min="0" max="100000000000" placeholder="{{ trans('index.ex') }}"
                                    wire:model="form.freehold_price" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled"
                                    wire:loading.attr="disabled">
                            </div>
                            <div class="form-text">
                                {{ trans('helper.required') }},
                                {{ trans('helper.min') }} : 0,
                                {{ trans('helper.max') }} : 100.000.000.000
                            </div>
                            @error('form.freehold_price')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <div class="col-sm-6">
        <label class="form-label" for="payment_plan_available">
            {{ trans('property.payment_plan_available') }}
        </label>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="payment_plan_available"
                name="payment_plan_available" value="1" {{ $form->payment_plan_available ? 'checked' : '' }}
                wire:model.lazy="form.payment_plan_available" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
            <label class="form-check-label text-{{ $form->payment_plan_available ? 'success' : 'danger' }}"
                for="payment_plan_available">
                {{ $form->payment_plan_available ? trans('index.yes') : trans('index.no') }}
            </label>
        </div>
        @error('form.payment_plan_available')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    @if ($form->payment_plan_available)
        <div class="col-sm-6">
            <label class="form-label" for="payment_plan_details">
                {{ trans('validation.attributes.payment_plan_details') }}
            </label>
            <x-form.trix model="form.payment_plan_details" />
            <div class="form-text">
                {{ trans('helper.minlength') }} : 1,
                {{ trans('helper.maxlength') }} : 65.535,
            </div>
            @error('form.payment_plan_details')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif

    <div class="col-sm-6">
        <label class="form-label" for="developer_name">
            {{ trans('property.developer_name') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-font fa-fw "></span>
            </div>
            <input type="text" class="form-control" id="developer_name" name="developer_name" minlength="1"
                maxlength="100" placeholder="{{ trans('index.ex') }} Villa Bali" wire:model="form.developer_name"
                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                wire:loading.attr="disabled">
        </div>
        <div class="form-text">
            {{ trans('helper.minlength') }} : 1,
            {{ trans('helper.maxlength') }} : 100
        </div>
        @error('form.developer_name')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-sm-6">
        <label class="form-label" for="video_tour">
            {{ trans('property.video_tour') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-video fa-fw "></span>
            </div>
            <input type="url" class="form-control" id="video_tour" name="video_tour" maxlength="255"
                placeholder="https://" wire:model="form.video_tour" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
        </div>
        <div class="form-text">
            {{ trans('property.video_tour_helper') }}
        </div>
        @error('form.video_tour')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-sm-6">
        <label class="form-label" for="floor_plan">
            {{ trans('property.floor_plan') }}
        </label>
        <div class="input-group">
            <div class="input-group-text">
                <span class="fas fa-image fa-fw "></span>
            </div>
            <input type="url" class="form-control" id="floor_plan" name="floor_plan" maxlength="255"
                placeholder="https://" wire:model="form.floor_plan" wire:offline.class="disabled"
                wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
        </div>
        <div class="form-text">
            {{ trans('property.floor_plan_helper') }}
        </div>
        @error('form.floor_plan')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12">
        <label class="form-label">
            {{ trans('property.highlights') }}
        </label>
        @foreach ($form->highlights as $i => $highlight)
            <div class="input-group mb-2" wire:key="highlight-{{ $i }}">
                <div class="input-group-text">
                    <span class="fas fa-star fa-fw "></span>
                </div>
                <input type="text" class="form-control" maxlength="255"
                    placeholder="{{ trans('property.highlights') }}" wire:model="form.highlights.{{ $i }}"
                    wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                    wire:loading.attr="disabled">
                <button type="button" class="btn btn-outline-danger" wire:click="removeHighlight({{ $i }})"
                    wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                    wire:loading.attr="disabled">
                    <span class="fas fa-trash fa-fw"></span>
                </button>
            </div>
            @error('form.highlights.' . $i)
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        @endforeach
        <button type="button" class="btn btn-outline-success btn-sm" wire:click="addHighlight"
            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
            wire:loading.attr="disabled">
            <span class="fas fa-plus fa-fw"></span>
            {{ trans('property.add_highlight') }}
        </button>
    </div>
</div>
