@section('title', trans('page.property'))
@section('icon', 'fas fa-building')

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="d-grid gap-3">
                <div class="row g-3">
                    <div class="col">
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-search fa-fw "></span>
                            </div>
                            <input type="search" class="form-control" id="search" name="search" minlength="1"
                                maxlength="50" placeholder="{{ trans('field.search') }}" wire:key="search"
                                wire:model.lazy="search" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                    </div>

                    <div class="col-auto">
                        <button type="button" class="btn btn-warning" wire:click="resetFilter" wire:key="resetFilter"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="resetFilter">
                                <span class="fas fa-eraser fa-fw"></span>
                                <span class="d-none d-sm-inline">{{ trans('index.reset_filter') }}</span>
                            </span>
                            <span wire:loading wire:target="resetFilter" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                <span class="d-none d-sm-inline">{{ trans('index.reset_filter') }}</span>
                            </span>
                        </button>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-12 col-sm-6 col-lg-3 col-xl-2" wire:ignore>
                        <label class="form-label" for="user_id">
                            {{ trans('field.user_id') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-user fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="user_id" name="user_id" wire:key="user_id"
                                wire:model.lazy="user_id" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">{{ trans('index.all') }} {{ trans('page.user') }}</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" wire:key="user-{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 col-xl-2" wire:ignore>
                        <label class="form-label" for="status">
                            {{ trans('field.status') }}
                        </label>
                        <div class="input-group">
                            <div class="input-group-text">
                                <span class="fas fa-list fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="status" name="status" wire:key="status"
                                wire:model.lazy="status" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">{{ trans('index.all') }} {{ trans('field.status') }}</option>
                                @foreach ($propertyStatuses as $propertyStatus)
                                    <option value="{{ $propertyStatus->value }}"
                                        wire:key="property-status-{{ $propertyStatus->value }}">
                                        {{ $propertyStatus->description() }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-lg-3 col-xl-auto">
                        <label class="form-label" for="start_date">
                            {{ trans('field.start_date') }}
                        </label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="start_date" name="start_date"
                                min="2026-01-01" max="2099-12-12" wire:key="start_date" wire:model.lazy="start_date"
                                wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                                wire:loading.attr="disabled">
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-lg-3 col-xl-auto">
                        <label class="form-label" for="end_date">
                            {{ trans('field.end_date') }}
                        </label>
                        <div class="input-group">
                            <input type="date" class="form-control" id="end_date" name="end_date" min="2026-01-01"
                                max="2099-12-12" wire:key="end_date" wire:model.lazy="end_date"
                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header text-bg-primary">
            <span class="fas fa-table fa-fw"></span>
            {{ trans('index.data') }} @yield('title')
        </div>

        <div class="card-body">
            <div class="row g-3">
                @can('property.add')
                    <div class="col col-sm-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.property.add') }}"
                            wire:navigate>
                            <span class="fas fa-plus fa-fw"></span>
                            <span>{{ trans('index.add') }}</span>
                        </a>
                    </div>
                @endcan

                @can('property.export')
                    <div class="col col-sm-auto">
                        <button type="button" class="btn btn-success w-100" wire:click="export" wire:key="export"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="export">
                                <span class="fas fa-file-excel fa-fw"></span>
                                <span>{{ trans('index.export') }}</span>
                            </span>
                            <span wire:loading wire:target="export" class="w-100">
                                <span class="spinner-border spinner-border-sm"></span>
                                <span>{{ trans('index.export') }}</span>
                            </span>
                        </button>
                    </div>
                @endcan
            </div>

            <hr />

            <div class="table-responsive border-bottom mb-3">
                <table
                    class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle table-primary">
                            <th width="1%">{{ trans('field.#') }}</th>
                            <th width="1%">{{ trans('field.id') }}</th>
                            <th width="1%">{{ trans('field.code') }}</th>
                            <th>{{ trans('field.name') }}</th>
                            <th width="1%">{{ trans('field.agent') }}</th>
                            <th width="1%">{{ trans('field.status') }}</th>
                            <th width="1%">{{ trans('field.created_at') }}</th>
                            <th width="1%">{{ trans('field.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($properties as $property)
                            <tr wire:key="property-{{ $property->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $property->id }}</td>
                                <td>{{ $property->code }}</td>
                                <td>{{ $property->name }}</td>
                                <td>{{ $property->user->name ?? '-' }}</td>
                                <td>
                                    <span class="badge text-bg-{{ $property->status->color() }} rounded-pill w-100">
                                        {{ $property->status->description() }}
                                    </span>
                                </td>
                                <td>{{ $property->created_at->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('property.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('cms.property.detail', ['property' => $property]) }}"
                                                wire:navigate>
                                                <span class="fas fa-list fa-fw"></span>
                                                <span>{{ trans('index.detail') }}</span>
                                            </a>
                                        @endcan

                                        @can('property.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('cms.property.edit', ['property' => $property]) }}"
                                                wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span>
                                                <span>{{ trans('index.edit') }}</span>
                                            </a>
                                        @endcan

                                        @can('property.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $property->id }})"
                                                wire:key="delete({{ $property->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $property->id }})">
                                                    <span class="fas fa-trash fa-fw"></span>
                                                    <span>{{ trans('index.delete') }}</span>
                                                </span>
                                                <span wire:loading wire:target="delete({{ $property->id }})"
                                                    class="w-100">
                                                    <span class="spinner-border spinner-border-sm"></span>
                                                    <span>{{ trans('index.delete') }}</span>
                                                </span>
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    {{ trans('message.no_data_available') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $properties->links('components.layouts.pagination') }}
        </div>
    </div>
</div>

@push('script')
    <script>
        $("#user_id").on("change", function() {
            @this.set("user_id", $(this).val())
        })

        $("#status").on("change", function() {
            @this.set("status", $(this).val())
        })
    </script>
@endpush
