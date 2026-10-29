@push('css')
    <link href="{{ asset('vendors/flatpickr-4.6.13/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('script')
    <script src="{{ asset('vendors/flatpickr-4.6.13/js/flatpickr.js') }}"></script>
    <script>
        window.initDatepickers = function() {
            document.querySelectorAll(".datepicker").forEach(function(el) {
                if (el._flatpickr) {
                    return;
                }

                flatpickr(el, {
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    allowInput: true,
                    disableMobile: true,
                });
            });
        };

        document.addEventListener("livewire:init", () => window.initDatepickers());
        document.addEventListener("livewire:navigated", () => window.initDatepickers());

        document.addEventListener("livewire:navigated", () => {
            Livewire.hook("commit", ({
                succeed
            }) => {
                succeed(() => {
                    queueMicrotask(() => window.initDatepickers());
                });
            });
        });
    </script>
@endpush
