@section('title', trans('page.contact'))
@section('icon', 'fas fa-phone')

<div class="container-fluid">
    <div class="d-grid gap-3 mb-3">
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-lg">
                <div class="input-group">
                    <div class="input-group-text">
                        <span class="fas fa-search fa-fw "></span>
                    </div>
                    <input type="search" class="form-control" id="search" name="search" minlength="1" maxlength="50"
                        placeholder="{{ trans('index.enter_to_search') }}" wire:key="search" wire:model.lazy="search"
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                </div>
            </div>

            <div class="col-6 col-sm-3 col-lg-auto">
                <div class="input-group">
                    <input type="date" class="form-control" id="start_date" name="start_date" min="2026-01-01"
                        max="2099-12-12" wire:key="start_date" wire:model.lazy="start_date"
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
                </div>
            </div>

            <div class="col-6 col-sm-3 col-lg-auto">
                <div class="input-group">
                    <input type="date" class="form-control" id="end_date" name="end_date" min="2026-01-01"
                        max="2099-12-12" wire:key="end_date" wire:model.lazy="end_date" wire:offline.class="disabled"
                        wire:offline.attr="disabled" wire:loading.class="disabled" wire:loading.attr="disabled">
                </div>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-warning text-nowrap" wire:click="resetFilter"
                    wire:key="resetFilter" wire:offline.class="disabled" wire:offline.attr="disabled"
                    wire:loading.class="disabled" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="resetFilter">
                        <span class="fas fa-eraser fa-fw"></span>
                        {{ trans('index.reset_filter') }}
                    </span>
                    <span wire:loading wire:target="resetFilter" class="w-100">
                        <span class="spinner-border spinner-border-sm"></span>
                        {{ trans('index.reset_filter') }}
                    </span>
                </button>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-success text-nowrap" wire:click="export" wire:key="export"
                    wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="export">
                        <span class="fas fa-file-excel fa-fw"></span>
                        {{ trans('index.export') }}
                    </span>
                    <span wire:loading wire:target="export" class="w-100">
                        <span class="spinner-border spinner-border-sm"></span>
                        {{ trans('index.export') }}
                    </span>
                </button>
            </div>

            <div class="col-auto">
                <button type="button" class="btn btn-primary text-nowrap" wire:click="export" wire:key="export"
                    wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                    wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="export">
                        <span class="fas fa-plus fa-fw"></span>
                        {{ trans('index.add') }}
                    </span>
                    <span wire:loading wire:target="export" class="w-100">
                        <span class="spinner-border spinner-border-sm"></span>
                        {{ trans('index.add') }}
                    </span>
                </button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table rounded table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
            <thead>
                <tr class="text-center align-middle table-primary">
                    <th width="1%">{{ trans('field.#') }}</th>
                    <th>{{ trans('field.id') }}</th>
                    <th>{{ trans('field.name') }}</th>
                    <th>{{ trans('field.company') }}</th>
                    <th>{{ trans('field.email') }}</th>
                    <th>{{ trans('field.phone') }}</th>
                    <th width="1%">{{ trans('field.created_at') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr wire:key="contact-{{ $contact->id }}">
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $contact->contact_id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->company }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->created_at->isoFormat('HH:mm - ddd, DD MMM YYYY') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="100%">
                            {{ trans('index.no_data_available') }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
