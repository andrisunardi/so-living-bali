@section('title', trans('page.user'))
@section('icon', 'fas fa-user')

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
                    <div class="col-12 col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <label class="form-label" for="role_id">
                            {{ trans('field.role_id') }}
                        </label>
                        <div class="input-group" wire:ignore>
                            <div class="input-group-text">
                                <span class="fas fa-key fa-fw "></span>
                            </div>
                            <select class="form-select select2" id="role_id" name="role_id" wire:key="role_id"
                                wire:model.lazy="role_id" wire:offline.class="disabled" wire:offline.attr="disabled"
                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                <option value="">{{ trans('index.all') }} {{ trans('page.role') }}</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" wire:key="role-{{ $role->id }}">
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
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
                @can('user.add')
                    <div class="col col-sm-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.user.add') }}"
                            wire:navigate>
                            <span class="fas fa-plus fa-fw"></span>
                            <span>{{ trans('index.add') }}</span>
                        </a>
                    </div>
                @endcan

                @can('user.export')
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
                            <th>{{ trans('field.email') }}</th>
                            <th>{{ trans('field.phone') }}</th>
                            <th>{{ trans('field.username') }}</th>
                            <th width="1%">{{ trans('field.is_active') }}</th>
                            <th width="1%">{{ trans('field.roles') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('page.property') }}</th>
                            <th width="1%">{{ trans('field.created_at') }}</th>
                            <th width="1%">{{ trans('field.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr wire:key="user-{{ $user->id }}">
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    @can('user.edit')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                id="is_active_{{ $user->id }}" name="is_active" value="1"
                                                {{ $user->is_active ? 'checked' : '' }}
                                                wire:key="is_active_{{ $user->id }}"
                                                wire:click="changeActive({{ $user->id }})"
                                                wire:offline.class="disabled" wire:offline.attr="disabled"
                                                wire:loading.class="disabled" wire:loading.attr="disabled">
                                            <label
                                                class="form-check-label text-{{ $user->is_active ? 'success' : 'danger' }}"
                                                for="is_active_{{ $user->id }}">
                                                {{ $user->is_active ? trans('index.yes') : trans('index.no') }}
                                            </label>
                                        </div>
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ $user->is_active ? 'success' : 'danger' }}">
                                            {{ $user->is_active ? trans('index.yes') : trans('index.no') }}
                                        </span>
                                    @endcan
                                </td>
                                <td>{{ $user->roles->pluck('name')->join(', ') }}</td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('cms.property.index', ['user_id' => $user->id]) }}"
                                        wire:navigate>
                                        {{ $user->properties_count }}
                                    </a>
                                </td>
                                <td>{{ $user->created_at->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('user.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('cms.user.detail', ['user' => $user]) }}" wire:navigate>
                                                <span class="fas fa-list fa-fw"></span>
                                                <span>{{ trans('index.detail') }}</span>
                                            </a>
                                        @endcan

                                        @can('user.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('cms.user.edit', ['user' => $user]) }}" wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span>
                                                <span>{{ trans('index.edit') }}</span>
                                            </a>
                                        @endcan

                                        @can('user.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $user->id }})"
                                                wire:key="delete({{ $user->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $user->id }})">
                                                    <span class="fas fa-trash fa-fw"></span>
                                                    <span>{{ trans('index.delete') }}</span>
                                                </span>
                                                <span wire:loading wire:target="delete({{ $user->id }})"
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

            {{ $users->links('components.layouts.pagination') }}
        </div>
    </div>
</div>

@push('script')
    <script>
        $("#role_id").on("change", function() {
            @this.set("role_id", $(this).val())
        })
    </script>
@endpush
