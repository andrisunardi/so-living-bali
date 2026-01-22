@section('title', trans('page.contact'))
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
                    <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.contact.index') }}"
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
                        {{ $contact->id }} {{ $contact->contact_id }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.name') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->name }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.company') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->company }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.email') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->email }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.phone') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->phone }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->created_at->diffForHumans() }})
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->created_at->diffForHumans() }})
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->createdBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_by') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        {{ $contact->updatedBy?->name ?? '-' }}
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.created_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($contact->created_at)
                            {{ $contact->created_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $contact->created_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <div class="fw-bold">{{ trans('field.updated_at') }}</div>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($contact->updated_at)
                            {{ $contact->updated_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $contact->updated_at->diffForHumans() }})
                        @endif
                    </div>
                </div>

                <div class="row border-top pt-3">
                    @can('contact.edit')
                        <div class="col-6 col-sm-auto">
                            {{-- <a draggable="false" class="btn btn-success w-100"
                                href="{{ route('cms.contact.edit', ['contact' => $contact]) }}" wire:navigate>
                                <span class="fas fa-arrow-left fa-fw"></span>
                                {{ trans('index.back') }}
                            </a> --}}
                        </div>
                    @endcan
                    @can('contact.delete')
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
</div>
