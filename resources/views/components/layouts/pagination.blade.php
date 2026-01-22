@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ trans('pagination.previous') }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <button type="button" class="page-link" rel="prev"
                            aria-label="{{ trans('pagination.previous') }}" wire:click="previousPage"
                            wire:loading.attr="disabled">
                            {{ trans('pagination.previous') }}
                        </button>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button" class="page-link" rel="next"
                            aria-label="{{ trans('pagination.next') }}" wire:click="nextPage"
                            wire:loading.attr="disabled">
                            {{ trans('pagination.next') }}
                        </button>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">{{ trans('pagination.next') }}</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-between">
            <div>
                <p class="small text-muted">
                    {{ trans('pagination.showing') }}
                    <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                    {{ trans('pagination.to') }}
                    <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                    {{ trans('pagination.of') }}
                    <span class="fw-semibold">{{ $paginator->total() }}</span>
                    {{ trans('pagination.results') }}
                </p>
            </div>

            <div>
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true"
                            aria-label="{{ trans('pagination.previous') }}">
                            <span class="page-link" aria-hidden="true">
                                {{ trans('pagination.previous') }}
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button" class="page-link" rel="prev"
                                aria-label="{{ trans('pagination.previous') }}" wire:click="previousPage"
                                wire:loading.attr="disabled">
                                {{ trans('pagination.previous') }}
                            </button>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <button type="button" class="page-link" href="{{ $url }}"
                                            wire:click="setPage({{ $page }})" wire:loading.attr="disabled">
                                            {{ $page }}
                                        </button>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <button type="button" class="page-link" rel="next"
                                aria-label="{{ trans('pagination.next') }}" wire:click="nextPage"
                                wire:loading.attr="disabled">
                                {{ trans('pagination.next') }}
                            </button>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true"
                            aria-label="{{ trans('pagination.next') }}">
                            <span class="page-link" aria-hidden="true">{{ trans('pagination.next') }}</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
