@push('css')
    <link href="{{ asset('vendors/flatpickr-4.6.13/css/flatpickr.min.css') }}" rel="stylesheet">
@endpush

@push('script')
    <script src="{{ asset('vendors/flatpickr-4.6.13/js/flatpickr.js') }}"></script>
    <script>
        window.initDatepickers = function() {
            document.querySelectorAll(".datepicker:not([data-fp-ready])").forEach(function(el) {
                el.setAttribute("data-fp-ready", "1");

                flatpickr(el, {
                    altInput: true,
                    altFormat: "d/m/Y",
                    dateFormat: "Y-m-d",
                    disableMobile: true,
                    onChange: function(selectedDates, dateStr) {
                        el.value = dateStr;
                        el.dispatchEvent(new Event("input", {
                            bubbles: true
                        }));
                        el.dispatchEvent(new Event("change", {
                            bubbles: true
                        }));
                    },
                });
            });
        };

        window.registerDatepickerMorphHook = function() {
            if (window.datepickerMorphHookRegistered) {
                return;
            }
            window.datepickerMorphHookRegistered = true;

            Livewire.hook("morph.updated", () => queueMicrotask(() => window.initDatepickers()));
        };

        document.addEventListener("livewire:navigated", () => window.initDatepickers());

        document.addEventListener("livewire:init", () => window.registerDatepickerMorphHook());

        if (window.Livewire) {
            window.registerDatepickerMorphHook();
        }

        window.initDatepickers();
    </script>
@endpush
