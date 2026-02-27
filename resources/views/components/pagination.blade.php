@if ($paginator->hasPages())
    <div class="row justify-content-center g-3">
        <div class="col-sm my-lg-auto">
            <div class="text-center text-lg-start text-muted">
                Showing
                <span class="fw-semibold">{{ $paginator->firstItem() }}</span>
                to
                <span class="fw-semibold">{{ $paginator->lastItem() }}</span>
                of
                <span class="fw-semibold">{{ $paginator->total() }}</span>
                results
            </div>
        </div>

        <div class="col-sm-auto">
            <div class="table-responsive">
                <ul class="pagination">
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">
                                Previous
                            </span>
                        </li>
                    @else
                        <li class="page-item">
                            <button type="button" class="page-link" wire:click="previousPage"
                                wire:loading.attr="disabled">
                                Previous
                            </button>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="page-item disabled">
                                <span class="page-link">{{ $element }}</span>
                            </li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active">
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
                            <button type="button" class="page-link" wire:click="nextPage" wire:loading.attr="disabled">
                                Next
                            </button>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endif
