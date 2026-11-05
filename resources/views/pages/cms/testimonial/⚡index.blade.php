<?php

use App\Exports\TestimonialExport;
use App\Livewire\Component;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Symfony\Component\HttpFoundation\StreamedResponse;

new #[Title('Testimonial')] class extends Component
{
    #[Url(except: '')]
    public string $search = '';

    public function updating(): void
    {
        $this->resetPage();
    }

    public function resetFilter(): void
    {
        $this->resetPage();

        $this->reset(['search']);
    }

    public function delete(Testimonial $testimonial): void
    {
        $service = new TestimonialService;
        $service->delete(testimonial: $testimonial);

        $this->alertSuccess(title: trans('index.delete').' '.trans('index.success'), body: trans('page.testimonial').' '.trans('message.has_been_successfully_deleted'));
    }

    public function testimonials(bool $paginate = true): object
    {
        $service = new TestimonialService;

        return $service->index(search: $this->search, paginate: $paginate);
    }

    public function export(): StreamedResponse
    {
        $this->alertSuccess(title: trans('index.export').' '.trans('index.success'), body: trans('page.testimonial').' '.trans('message.has_been_successfully_exported'));

        $service = new TestimonialService;
        $testimonials = $service->index(orderBy: 'id', sortBy: 'asc', paginate: false);
        $testimonials->loadMissing(['createdBy', 'updatedBy']);

        return (new TestimonialExport(testimonials: $testimonials))->download(trans('page.testimonial').'.xlsx');
    }
};
?>

@section('title', trans('page.testimonial'))

<div class="container-fluid">
    <div class="card">
        <div class="card-header text-bg-primary">
            <span class="fas fa-search fa-fw"></span>
            {{ trans('index.search') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col">
                    <div class="input-group">
                        <div class="input-group-text">
                            <span class="fas fa-search fa-fw "></span>
                        </div>
                        <input type="search" class="form-control" id="search" name="search" minlength="1"
                            maxlength="100" placeholder="{{ trans('field.search') }}" wire:model.lazy="search"
                            wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                            wire:loading.attr="disabled">
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="btn btn-warning" wire:click="resetFilter"
                        wire:offline.class="disabled" wire:offline.attr="disabled" wire:loading.class="disabled"
                        wire:loading.attr="disabled">
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
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header text-bg-primary">
            <span class="fas fa-comment-dots fa-fw"></span>
            {{ trans('index.list') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                @can('testimonial.add')
                    <div class="col-auto">
                        <a draggable="false" class="btn btn-primary w-100" href="{{ route('cms.testimonial.add') }}"
                            wire:navigate>
                            <span class="fas fa-plus fa-fw"></span>
                            <span>{{ trans('index.add') }}</span>
                        </a>
                    </div>
                @endcan

                @can('testimonial.export')
                    <div class="col-auto">
                        <button type="button" class="btn btn-success w-100" wire:click="export"
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
                <table class="table table-striped table-hover table-bordered text-nowrap table-responsive align-middle">
                    <thead>
                        <tr class="text-center align-middle table-primary">
                            <th width="1%">{{ trans('field.#') }}</th>
                            <th width="1%">{{ trans('field.id') }}</th>
                            <th>{{ trans('field.name') }}</th>
                            <th>{{ trans('field.job') }}</th>
                            <th>{{ trans('field.company') }}</th>
                            <th>{{ trans('field.word') }}</th>
                            <th width="1%">{{ trans('field.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($this->testimonials() as $testimonial)
                            <tr wire:key="testimonial-{{ $testimonial->id }}">
                                <td class="text-center">
                                    {{ ($this->testimonials()->currentPage() - 1) * $this->testimonials()->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <a draggable="false"
                                        href="{{ route('cms.testimonial.detail', ['testimonial' => $testimonial]) }}"
                                        wire:navigate>
                                        {{ $testimonial->id }}
                                    </a>
                                </td>
                                <td>
                                    <a draggable="false"
                                        href="{{ route('cms.testimonial.detail', ['testimonial' => $testimonial]) }}"
                                        wire:navigate>
                                        {{ $testimonial->name }}
                                    </a>
                                </td>
                                <td>{{ $testimonial->job }}</td>
                                <td>{{ $testimonial->company }}</td>
                                <td class="text-wrap" style="min-width: 20rem;">{{ Str::limit($testimonial->word, 120) }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @can('testimonial.detail')
                                            <a draggable="false" class="btn btn-info btn-sm"
                                                href="{{ route('cms.testimonial.detail', ['testimonial' => $testimonial]) }}"
                                                wire:navigate>
                                                <span class="fas fa-list fa-fw"></span>
                                                <span>{{ trans('index.detail') }}</span>
                                            </a>
                                        @endcan

                                        @can('testimonial.edit')
                                            <a draggable="false" class="btn btn-success btn-sm"
                                                href="{{ route('cms.testimonial.edit', ['testimonial' => $testimonial]) }}"
                                                wire:navigate>
                                                <span class="fas fa-edit fa-fw"></span>
                                                <span>{{ trans('index.edit') }}</span>
                                            </a>
                                        @endcan

                                        @can('testimonial.delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $testimonial->id }})" wire:offline.class="disabled"
                                                wire:offline.attr="disabled" wire:loading.class="disabled"
                                                wire:loading.attr="disabled">
                                                <span wire:loading.remove wire:target="delete({{ $testimonial->id }})">
                                                    <span class="fas fa-trash fa-fw"></span>
                                                    <span>{{ trans('index.delete') }}</span>
                                                </span>
                                                <span wire:loading wire:target="delete({{ $testimonial->id }})"
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

            {{ $this->testimonials()->links('pagination') }}
        </div>
    </div>
</div>
