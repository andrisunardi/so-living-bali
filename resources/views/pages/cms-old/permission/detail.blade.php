@section('title', trans('page.permission'))
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
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.permission.index') }}" wire:navigate>
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
                        {{ $permission->id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.guard_name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->guard_name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.roles') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->roles->pluck('name')->join(', ') }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('index.total') }} {{ trans('page.role') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->roles_count }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('index.total') }} {{ trans('page.user') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $permission->users_count }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($permission->created_at)
                            {{ $permission->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $permission->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($permission->updated_at)
                            {{ $permission->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $permission->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            </div>

            <hr />

            <div class="row g-3">
                @can('permission.edit')
                    <div class="col-6 col-sm-auto">
                        <a draggable="false" class="btn btn-success w-100"
                            href="{{ route('cms.permission.edit', ['permission' => $permission]) }}" wire:navigate>
                            <span class="fas fa-edit fa-fw"></span>
                            {{ trans('index.edit') }}
                        </a>
                    </div>
                @endcan

                @can('permission.delete')
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
