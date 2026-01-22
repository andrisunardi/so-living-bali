<div class="modal fade" id="modal-language" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    <span class="fas fa-language fa-fw"></span>
                    {{ trans('language.language') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="d-grid gap-3">
                    @foreach ($languages as $language)
                        <div wire:key="language-{{ $language['id'] }}">
                            <a draggable="false"
                                class="btn btn-outline-primary w-100 {{ App::isLocale($language['code']) ? 'active' : '' }}"
                                href="{{ url('locale/' . $language['code']) }}">
                                {{ Str::upper($language['code']) . ' - ' . $language['name'] }}
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
