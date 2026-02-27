@section('title', trans('page.district'))
@section('icon', 'fas fa-city')

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
                    <div class="col-6 col-sm-auto">
                        <label class="form-label" for="is_show">
                            {{ trans('field.is_show') }}
                        </label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="is_show_1" name="is_show"
                                    value="1" wire:key="is_show" wire:model.lazy="is_show"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_show_1">
                                    {{ trans('index.yes') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="is_show_0" name="is_show"
                                    value="0" wire:key="is_show" wire:model.lazy="is_show"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_show_0">
                                    {{ trans('index.no') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-sm-auto">
                        <label class="form-label" for="is_active">
                            {{ trans('field.is_active') }}
                        </label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="is_active_1" name="is_active"
                                    value="1" wire:key="is_active" wire:model.lazy="is_active"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_1">
                                    {{ trans('index.yes') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="is_active_0" name="is_active"
                                    value="0" wire:key="is_active" wire:model.lazy="is_active"
                                    wire:offline.class="disabled" wire:offline.attr="disabled"
                                    wire:loading.class="disabled" wire:loading.attr="disabled">
                                <label class="form-check-label" for="is_active_0">
                                    {{ trans('index.no') }}
                                </label>
                            </div>
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
                @can('district.add')
                    <div class="col col-sm-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.district.add') }}"
                            wire:navigate>
                            <span class="fas fa-plus fa-fw"></span>
                            <span>{{ trans('index.add') }}</span>
                        </a>
                    </div>
                @endcan

                @can('district.export')
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
                            <th>{{ trans('field.name') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('page.area') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('page.property') }}</th>
                            <th width="1%">{{ trans('field.show') }}</th>
                            <th width="1%">{{ trans('field.active') }}</th>
                            <th width="1%">{{ trans('field.created_at') }}</th>
                            <th width="1%">{{ trans('field.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($districts as $district)
                            <tr wire:key="district-{{ $district->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('cms.district.detail', ['district' => $district]) }}"
                                        wire:navigate>
                                        {{ $district->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false"
                                        href="{{ route('cms.district.detail', ['district' => $district]) }}"
                                        wire:navigate>
                                        {{ $district->name }}
                                    </a>
                                </td>
                                <td class="text-center">0</td>
                                <td class="text-center">0</td>
                                <td>
                                    @can('district.edit')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="is_show_{{ $district->id }}" name="is_show" value="1"
                                                {{ $district->is_show ? 'checked' : '' }}
                                                wire:key="is_show_{{ $district->id }}"
                                                wire:click="changeActive({{ $district->id }})"
                                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                            <label
                                                class="form-check-label text-{{ $district->is_show ? 'success' : 'danger' }}"
                                                for="is_show_{{ $district->id }}">
                                                {{ $district->is_show ? trans('index.yes') : trans('index.no') }}
                                            </label>
                                        </div>
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ $district->is_show ? 'success' : 'danger' }}">
                                            {{ $district->is_show ? trans('index.yes') : trans('index.no') }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('district.edit')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="is_active_{{ $district->id }}" name="is_active" value="1"
                                                {{ $district->is_active ? 'checked' : '' }}
                                                wire:key="is_active_{{ $district->id }}"
                                                wire:click="changeActive({{ $district->id }})"
                                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                            <label
                                                class="form-check-label text-{{ $district->is_active ? 'success' : 'danger' }}"
                                                for="is_active_{{ $district->id }}">
                                                {{ $district->is_active ? trans('index.yes') : trans('index.no') }}
                                            </label>
                                        </div>
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ $district->is_active ? 'success' : 'danger' }}">
                                            {{ $district->is_active ? trans('index.yes') : trans('index.no') }}
                                        </span>
                                    @endcan
                                </td>
                                <td>{{ $district->created_at->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('district.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('cms.district.detail', ['district' => $district]) }}"
                                                wire:navigate>
                                                <span class="fas fa-list fa-fw"></span>
                                                <span>{{ trans('index.detail') }}</span>
                                            </a>
                                        @endcan

                                        @can('district.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('cms.district.edit', ['district' => $district]) }}"
                                                wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span>
                                                <span>{{ trans('index.edit') }}</span>
                                            </a>
                                        @endcan

                                        @can('district.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $district->id }})"
                                                wire:key="delete({{ $district->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $district->id }})">
                                                    <span class="fas fa-trash fa-fw"></span>
                                                    <span>{{ trans('index.delete') }}</span>
                                                </span>
                                                <span wire:loading wire:target="delete({{ $district->id }})"
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

            {{ $districts->links('components.layouts.pagination') }}
        </div>
    </div>
</div>
