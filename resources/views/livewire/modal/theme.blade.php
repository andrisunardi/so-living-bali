<div class="modal fade" id="modal-theme" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" wire:ignore.self>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">
                    <span class="fas fa-circle-half-stroke fa-fw"></span>
                    {{ trans('theme.theme') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-light border-dark w-100" data-bs-theme-value="light">
                            <span class="fas fa-sun fa-fw"></span>
                            <span>{{ trans('theme.light') }}</span>
                        </button>
                    </div>

                    <div class="col-sm-4">
                        <button type="button" class="btn btn-dark border-light w-100" data-bs-theme-value="dark">
                            <span class="fas fa-moon fa-fw"></span>
                            <span>{{ trans('theme.dark') }}</span>
                        </button>
                    </div>

                    <div class="col-sm-4">
                        <button type="button" class="btn btn-secondary w-100" data-bs-theme-value="auto">
                            <span class="fas fa-circle-half-stroke fa-fw"></span>
                            <span>{{ trans('theme.auto') }}</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(function() {
            const icons = {
                light: 'fas fa-sun',
                dark: 'fas fa-moon',
                auto: 'fas fa-circle-half-stroke'
            };

            const translate = {
                light: "{{ trans('theme.light') }}",
                dark: "{{ trans('theme.dark') }}",
                auto: "{{ trans('theme.auto') }}"
            };

            const updateTheme = (theme) => {
                $('.theme-name').text(translate[theme] || translate.auto);
                $('.theme-icon').attr('class', 'theme-icon ' + (icons[theme] || icons.auto));
            };

            updateTheme(localStorage.getItem('theme') || 'auto');

            $('#modal-theme button[data-bs-theme-value]').on('click', function() {
                const theme = $(this).data('bs-theme-value');
                localStorage.setItem('theme', theme);
                updateTheme(theme);
            });
        });
    </script>
@endpush
