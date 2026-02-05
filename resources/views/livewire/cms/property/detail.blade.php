@section('title', trans('page.property'))
@section('icon', 'fas fa-list')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-info">
            <span class="fas fa-list fa-fw"></span>
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.property.index') }}"
                        wire:navigate>
                        <span class="fas fa-arrow-left fa-fw"></span>
                        {{ trans('index.back') }}
                    </a>
                </div>
            </div>

            <hr />

            <div class="d-grid gap-3">
                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.id') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->name }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.property_identity') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.internal_property_code') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->code }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.availability_date') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->availability_date?->isoFormat('DD MMMM YYYY') ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.agent_name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->user->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.date_of_visit') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->visit_date?->isoFormat('DD MMMM YYYY') ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.location') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.gps_coordinates') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->latitude ?? '-' }} / {{ $property->longitude ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.address') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->address ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.district_or_area') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->area ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.size_and_surfaces') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.land_size') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->land_size ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.building_size') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->building_size ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.number_of_floors') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->number_of_floors ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.outdoor_area_size') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->outdoor_area_size ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.pool_size') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->pool_size ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.bathrooms_and_layout') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.number_of_bathrooms') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->number_of_bathrooms ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.ensuite_bathrooms') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->ensuite_bathrooms ? 'success' : 'danger' }}">
                            {{ $property->ensuite_bathrooms ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.guest_toilet') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span class="badge rounded-pill text-bg-{{ $property->guest_toilet ? 'success' : 'danger' }}">
                            {{ $property->guest_toilet ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.storage_or_staff_area') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span class="badge rounded-pill text-bg-{{ $property->storage ? 'success' : 'danger' }}">
                            {{ $property->storage ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.living_style') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->living_style?->description() ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.legal_and_basic_eligibility') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.full_legal_documentation_available') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->full_legal_documentation ? 'success' : 'danger' }}">
                            {{ $property->full_legal_documentation ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.fully_furnished') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->fully_furnished ? 'success' : 'danger' }}">
                            {{ $property->fully_furnished ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.rental_type_accepted') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->rental_type?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.minimum_rental_duration') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->rental_type?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.owner_price_flexibility') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->owner_price_flexibility?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">
                            {{ trans('property.price_coherent_with_upper_or_premium_positioning') }}
                        </div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->price_coherent_with_upper ? 'success' : 'danger' }}">
                            {{ $property->price_coherent_with_upper ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.environment_and_tranquillity') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.not_directly_exposed_to_main_road') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->not_directly_exposed_to_main_road ? 'success' : 'danger' }}">
                            {{ $property->not_directly_exposed_to_main_road ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.no_festive_venue_nearby') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->no_festive_venue_nearby ? 'success' : 'danger' }}">
                            {{ $property->no_festive_venue_nearby ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.no_ongoing_or_imminent_construction') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span class="badge rounded-pill text-bg-{{ $property->no_ongoing ? 'success' : 'danger' }}">
                            {{ $property->no_ongoing ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.quiet_access_road_or_gang') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->quiet_access_road ? 'success' : 'danger' }}">
                            {{ $property->quiet_access_road ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.orientation') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->orientation?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.view') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->view ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.light_and_acoustics') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.living_area_has_natural_light') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->living_area_has_natural_light ? 'success' : 'danger' }}">
                            {{ $property->living_area_has_natural_light ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.bedroom_1_has_natural_light') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->bedroom_1_has_natural_light ? 'success' : 'danger' }}">
                            {{ $property->bedroom_1_has_natural_light ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.bedroom_2_has_natural_light') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->bedroom_2_has_natural_light ? 'success' : 'danger' }}">
                            {{ $property->bedroom_2_has_natural_light ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.noise_source_identified') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->noise_source_identifieds ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.view') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->view ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.utilities_and_technical') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.internet_speedtest') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->internet_speedtest ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.power_backup') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->power_backup?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.water_source') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->water_source?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.electricty') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->electricity?->description() ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.category_assessment') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.eligible_for_upper') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->eligible_for_upper ? 'success' : 'danger' }}">
                            {{ $property->eligible_for_upper ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.eligible_for_premium') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->eligible_for_premium ? 'success' : 'danger' }}">
                            {{ $property->eligible_for_premium ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.design_led_or_instagrammable') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.design_driven_property') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->design_driven_property ? 'success' : 'danger' }}">
                            {{ $property->design_driven_property ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.usability_limitations_identified') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->usability_limitations ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.trade_off_or_target_profile') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.trade_off_identified') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span
                            class="badge rounded-pill text-bg-{{ $property->trade_off_identified ? 'success' : 'danger' }}">
                            {{ $property->trade_off_identified ? trans('index.yes') : trans('index.no') }}
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.if_yes_describe_briefly') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->trade_off_description ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.operational_risk') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.operational_risk_level') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->operational_risk?->description() ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.comments_if_medium_or_high') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->operational_risk_comment ?? '-' }}
                    </div>
                </div>

                <br />

                <h5 class="fw-bold text-uppercase border-bottom pb-3">
                    {{ trans('property.final_decision') }}
                </h5>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('property.status') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        <span class="badge rounded-pill text-bg-{{ $property->status->color() }}">
                            {{ $property->status->description() }}
                        </span>
                    </div>
                </div>

                <br />

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->createdBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $property->updatedBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($property->created_at)
                            {{ $property->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $property->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($property->updated_at)
                            {{ $property->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $property->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                @can('property.edit')
                    <div class="col-6 col-sm-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('cms.property.edit', ['property' => $property]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span>
                            {{ trans('index.edit') }}
                        </a>
                    </div>
                @endcan

                @can('property.delete')
                    <div class="col-6 col-sm-auto">
                        <button type="button" class="btn btn-danger w-100" wire:click="delete" wire:key="delete"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="delete">
                                <span class="fas fa-trash fa-fw"></span>
                                <span>{{ trans('index.delete') }}</span>
                            </span>
                            <span wire:loading wire:target="delete" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                <span>{{ trans('index.delete') }}</span>
                            </span>
                        </button>
                    </div>
                @endcan
            </div>
        </div>
    </div>
</div>
