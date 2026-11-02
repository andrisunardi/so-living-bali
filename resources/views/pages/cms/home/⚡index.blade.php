<?php

use App\Livewire\Component;
use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component {
    public function listYourProperties(): LengthAwarePaginator
    {
        return Property::query()
            ->where('code', 'like', 'LYP%')
            ->with(['owner', 'area', 'district', 'image'])
            ->latest('id')
            ->paginate(12);
    }

    public function with(): array
    {
        return [
            'listYourProperties' => $this->listYourProperties(),
        ];
    }
};
?>

@section('title', trans('page.home'))

<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header text-bg-primary d-flex align-items-center justify-content-between">
            <span>
                <span class="fas fa-house-circle-check fa-fw"></span>
                {{ trans('index.list_your_property_submissions') }}
            </span>
            <span class="badge text-bg-light rounded-pill">{{ $listYourProperties->total() }}</span>
        </div>

        <div class="card-body">
            @if ($listYourProperties->isEmpty())
                <div class="text-center text-body-secondary py-5">
                    <span class="fas fa-inbox fa-2x d-block mb-3"></span>
                    {{ trans('index.list_your_property_empty') }}
                </div>
            @else
                <div class="row g-3">
                    @foreach ($listYourProperties as $property)
                        <div class="col-12 col-md-6 col-xl-4" wire:key="lyp-{{ $property->id }}">
                            @can('property.detail')
                                <a draggable="false"
                                    href="{{ route('cms.property.detail', ['property' => $property]) }}"
                                    class="text-decoration-none text-reset" wire:navigate>
                            @endcan

                            <div class="card h-100 shadow-sm">
                                <div class="ratio ratio-16x9 bg-body-tertiary rounded-top overflow-hidden">
                                    @if ($property->image)
                                        <img draggable="false" loading="lazy" decoding="async"
                                            class="img-fluid w-100 h-100 object-fit-cover"
                                            src="{{ $property->image->image_url }}"
                                            alt="{{ trans('property.property') }} - {{ $property->code }}"
                                            onerror="this.src='{{ asset('images/image-not-available.png') }}'" />
                                    @else
                                        <span
                                            class="fas fa-house fa-2x text-body-secondary d-flex align-items-center justify-content-center"></span>
                                    @endif
                                </div>

                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between gap-2 mb-2">
                                        <span class="fw-bold">{{ $property->code }}</span>
                                        <span class="badge text-bg-{{ $property->status->color() }} rounded-pill">
                                            {{ $property->status->description() }}
                                        </span>
                                    </div>

                                    <div class="fw-semibold text-truncate" title="{{ $property->name }}">
                                        {{ $property->name }}
                                    </div>

                                    <div class="small text-body-secondary mt-2 d-grid gap-1">
                                        @if ($property->owner)
                                            <div>
                                                <span class="fas fa-user fa-fw"></span>
                                                {{ $property->owner->name }}
                                            </div>
                                        @endif

                                        @if ($property->rental_type)
                                            <div>
                                                <span class="fas fa-tag fa-fw"></span>
                                                {{ $property->rental_type->description() }}
                                            </div>
                                        @endif

                                        @if ($property->bedroom)
                                            <div>
                                                <span class="fas fa-bed fa-fw"></span>
                                                {{ $property->bedroom->description() }}
                                            </div>
                                        @endif

                                        @if ($property->district || $property->area)
                                            <div>
                                                <span class="fas fa-location-dot fa-fw"></span>
                                                {{ collect([$property->area?->name, $property->district?->name])->filter()->implode(', ') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="card-footer bg-transparent small text-body-secondary">
                                    <span class="fas fa-clock fa-fw"></span>
                                    {{ trans('field.created') }} :
                                    {{ $property->created_at?->isoFormat('ddd, DD MMM YYYY HH:mm') }}
                                </div>
                            </div>

                            @can('property.detail')
                                </a>
                            @endcan
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $listYourProperties->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
