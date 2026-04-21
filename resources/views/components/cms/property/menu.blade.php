<div class="sticky-top bg-body" style="top: 3.5rem;">
    <div class="d-flex overflow-auto flex-nowrap gap-3 py-3 mb-3 border-bottom">
        @foreach ($this->propertyTabs() as $propertyTab)
            <button type="button"
                class="btn btn-outline-primary text-nowrap icon-link {{ $propertyTab->value == $tab ? 'active' : '' }}"
                wire:click="changeTab({{ $propertyTab->value }})">
                {{ $propertyTab->description() }}
            </button>
        @endforeach
    </div>
</div>
