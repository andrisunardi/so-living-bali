<?php

use App\Livewire\Component;
use App\Models\Property;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;

new #[Title('Home')] class extends Component
{
    public function listYourProperties(): LengthAwarePaginator
    {
        return Property::query()
            ->where('code', 'like', 'LYP%')
            ->with(['owner', 'area', 'district'])
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
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h4 mb-0">
            <span class="fas fa-house-circle-check fa-fw text-primary"></span>
            {{ trans('index.list_your_property_submissions') }}
        </h1>
        <span class="badge text-bg-primary rounded-pill">{{ $listYourProperties->total() }}</span>
    </div>

    @if ($listYourProperties->isEmpty())
        <div class="card">
            <div class="card-body text-center text-body-secondary py-5">
                <span class="fas fa-inbox fa-2x d-block mb-3"></span>
                {{ trans('index.list_your_property_empty') }}
            </div>
        </div>
    @else
        <div class="d-grid gap-3">
            @foreach ($listYourProperties as $property)
                <div class="card shadow-sm" wire:key="lyp-{{ $property->id }}">
                    <div class="card-body d-flex flex-column gap-3">
                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 pb-2 border-bottom">
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                <a draggable="false"
                                    href="{{ route('cms.property.detail', ['property' => $property]) }}"
                                    class="fw-bold text-decoration-none" wire:navigate>
                                    <span class="fas fa-code fa-fw text-primary"></span>
                                    {{ $property->code }}
                                </a>
                                <span class="text-body-secondary">&middot;</span>
                                <span class="fw-medium">{{ $property->name }}</span>
                                <span class="badge text-bg-{{ $property->status->color() }} rounded-pill">
                                    {{ $property->status->description() }}
                                </span>
                            </div>
                            <span class="small text-body-secondary">
                                <span class="fas fa-clock fa-fw"></span>
                                {{ $property->created_at?->isoFormat('ddd, DD MMM YYYY HH:mm') }}
                            </span>
                        </div>

                        <div class="row g-4">
                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="text-uppercase small fw-semibold text-body-secondary mb-2">
                                    {{ trans('field.contact') }}
                                </div>
                                <div class="d-flex flex-column gap-1 small">
                                    @if ($property->owner?->name)
                                        <div>
                                            <span class="fas fa-user fa-fw text-body-secondary"></span>
                                            {{ $property->owner->name }}
                                        </div>
                                    @endif
                                    @if ($property->owner?->phone)
                                        <div>
                                            <span class="fas fa-phone fa-fw text-body-secondary"></span>
                                            <a draggable="false" class="text-decoration-none"
                                                href="tel:{{ $property->owner->phone }}">{{ $property->owner->phone }}</a>
                                        </div>
                                    @endif
                                    @if ($property->owner?->email)
                                        <div class="text-break">
                                            <span class="fas fa-envelope fa-fw text-body-secondary"></span>
                                            <a draggable="false" class="text-decoration-none"
                                                href="mailto:{{ $property->owner->email }}">{{ $property->owner->email }}</a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-3">
                                <div class="text-uppercase small fw-semibold text-body-secondary mb-2">
                                    {{ trans('property.type') }}
                                </div>
                                <div class="d-flex flex-column gap-1 small">
                                    @if ($property->rental_type)
                                        <div>
                                            <span class="fas fa-tag fa-fw text-body-secondary"></span>
                                            {{ $property->rental_type->description() }}
                                        </div>
                                    @endif
                                    @if ($property->google_maps_url)
                                        <div>
                                            <span class="fas fa-location-dot fa-fw text-body-secondary"></span>
                                            <a draggable="false" class="text-decoration-none"
                                                href="{{ $property->google_maps_url }}" target="_blank" rel="noopener">
                                                {{ trans('property.google_maps_url') }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-xl-6">
                                <div class="text-uppercase small fw-semibold text-body-secondary mb-2">
                                    {{ trans('field.description') }}
                                </div>
                                <p class="small text-body-secondary mb-0">
                                    {{ $property->description ? Str::limit(strip_tags($property->description), 300) : '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $listYourProperties->links() }}
        </div>
    @endif
</div>
