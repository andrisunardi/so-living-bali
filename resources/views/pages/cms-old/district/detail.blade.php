@section('title', trans('page.district'))
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
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.district.index') }}"
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
                        {{ $district->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $district->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.show') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @can('district.edit')
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="is_show_{{ $district->id }}" name="is_show" value="1"
                                    {{ $district->is_show ? 'checked' : '' }} wire:key="is_show_{{ $district->id }}"
                                    wire:click="changeShow({{ $district->id }})" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label text-{{ $district->is_show ? 'success' : 'danger' }}"
                                    for="is_show_{{ $district->id }}">
                                    {{ $district->is_show ? trans('index.yes') : trans('index.no') }}
                                </label>
                            </div>
                        @else
                            <span class="badge rounded-pill text-bg-{{ $district->is_show ? 'success' : 'danger' }}">
                                {{ $district->is_show ? trans('index.yes') : trans('index.no') }}
                            </span>
                        @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.active') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @can('district.edit')
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="is_active_{{ $district->id }}" name="is_active" value="1"
                                    {{ $district->is_active ? 'checked' : '' }} wire:key="is_active_{{ $district->id }}"
                                    wire:click="changeActive({{ $district->id }})" wire:offline.class="disabled"
                                    wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label text-{{ $district->is_active ? 'success' : 'danger' }}"
                                    for="is_active_{{ $district->id }}">
                                    {{ $district->is_active ? trans('index.yes') : trans('index.no') }}
                                </label>
                            </div>
                        @else
                            <span class="badge rounded-pill text-bg-{{ $district->is_active ? 'success' : 'danger' }}">
                                {{ $district->is_active ? trans('index.yes') : trans('index.no') }}
                            </span>
                        @endcan
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('index.total') }} {{ trans('page.area') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        0
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('index.total') }} {{ trans('page.property') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        0
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $district->createdBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $district->updatedBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($district->created_at)
                            {{ $district->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $district->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($district->updated_at)
                            {{ $district->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $district->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                @can('district.edit')
                    <div class="col-6 col-sm-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('cms.district.edit', ['district' => $district]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span>
                            {{ trans('index.edit') }}
                        </a>
                    </div>
                @endcan

                @can('district.delete')
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
