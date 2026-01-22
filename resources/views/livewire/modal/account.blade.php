<div class="modal fade" id="modal-account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    <span class="fas fa-user fa-fw"></span>
                    {{ trans('page.account') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @auth
                    <div class="d-grid gap-3">
                        <div class="d-flex justify-content-center text-center">
                            <img draggable="false" class="img-fluid rounded-circle" width="100"
                                src="{{ Auth::user()->image_url ?? asset('images/user.png') }}"
                                alt="{{ trans('field.image') }} - {{ config('app.name') }}"
                                onerror="asset('images/user.png')" />
                        </div>

                        <div class="text-center">
                            <div class="fw-bold">{{ Auth::user()->name }}</div>
                            <div>{{ Auth::user()->username }}</div>
                        </div>

                        @if (Auth::user()->roles->count())
                            <div class="d-flex justify-content-between align-items-center gap-3 border-top pt-3">
                                <div class="text-nowrap">
                                    <span class="fas fa-key fa-fw"></span>
                                    <span class="fw-bold">{{ trans('field.roles') }}</span>
                                </div>
                                <div class="text-end">
                                    <div>{{ Auth::user()->roles->pluck('name')->join(', ') }}</div>
                                </div>
                            </div>
                        @endif

                        <div class="d-flex justify-content-between align-items-center gap-3 border-top pt-3">
                            <div class="text-nowrap">
                                <span class="fas fa-envelope fa-fw"></span>
                                <span class="fw-bold">{{ trans('field.email') }}</span>
                            </div>
                            <div class="text-end">
                                {{ Auth::user()->email }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 border-top pt-3">
                            <div class="text-nowrap">
                                <span class="fas fa-phone fa-fw"></span>
                                <span class="fw-bold">{{ trans('field.phone') }}</span>
                            </div>
                            <div class="text-end">
                                {{ Auth::user()->phone }}
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center gap-3 border-top pt-3">
                            <div class="text-nowrap">
                                <span class="fas fa-calendar fa-fw"></span>
                                <span class="fw-bold">{{ trans('field.join_date') }}</span>
                            </div>
                            <div class="text-end">
                                {{ Auth::user()->created_at->isoFormat('HH:mm - ddd, DD MMM YYYY') }}
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="modal-footer">
                <a draggable="false" class="btn btn-danger w-100" href="{{ route('cms.logout') }}">
                    <span class="fas fa-right-from-bracket fafw"></span>
                    {{ trans('page.logout') }}
                </a>
            </div>
        </div>
    </div>
</div>
