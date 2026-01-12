@section('title', trans('page.contact'))
@section('icon', 'fas fa-phone')

<div>
    <div class="row justify-content-between gap-3">
        <div class="col">
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
    </div>

    @forelse ($contacts as $contact)
        <div class="card card-body " wire:key="contact-{{ $contact->id }}">
            <div class="row align-items-center">
                <div class="col fw-bold text-truncate">
                    {{ $loop->iteration }}. {{ $contact->name }}
                </div>
                <div class="col-auto text-nowrap font-monospace">
                    <span class="fas fa-key fa-fw"></span>
                    {{ $contact->roles_count }}
                </div>
                <div class="col-auto text-nowrap font-monospace">
                    <span class="fas fa-user fa-fw"></span>
                    {{ $contact->users_count }}
                </div>
            </div>

            <div wire:click="detail({{ $contact->id }})" class="stretched-link pointer"></div>
        </div>
    @empty
        @livewire('layouts.no-data-available')
    @endforelse
</div>
