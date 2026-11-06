@push('css')
    <link href="{{ asset('vendors/bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet">
@endpush

@assets
    <script src="{{ asset('vendors/bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        function initTooltips() {
            if (typeof bootstrap === 'undefined') return;

            document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                var existing = bootstrap.Tooltip.getInstance(el);
                if (existing) existing.dispose();
                new bootstrap.Tooltip(el);
            });
        }

        function disposeOpenOverlays() {
            if (typeof bootstrap === 'undefined') return;

            document.querySelectorAll('.offcanvas.show').forEach(function(el) {
                bootstrap.Offcanvas.getInstance(el)?.hide();
            });

            document.querySelectorAll('.modal.show').forEach(function(el) {
                bootstrap.Modal.getInstance(el)?.hide();
            });

            document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(function(el) {
                bootstrap.Dropdown.getInstance(el)?.hide();
            });
        }

        function clearStuckOverlays() {
            document.querySelectorAll('.modal-backdrop, .offcanvas-backdrop').forEach(function(el) {
                el.remove();
            });

            document.body.classList.remove('modal-open', 'offcanvas-backdrop');
            document.body.style.removeProperty('overflow');
            document.body.style.removeProperty('padding-right');
        }

        document.addEventListener('livewire:navigate', disposeOpenOverlays);

        document.addEventListener('livewire:navigated', function() {
            clearStuckOverlays();
            initTooltips();
        });
    </script>
@endassets
