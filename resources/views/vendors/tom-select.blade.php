@push('css')
    <link href="{{ asset('vendors/tom-select-2.4.5/css/tom-select.bootstrap5.min.css') }}" rel="stylesheet">
@endpush

@push('script')
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/tom-select@2.4.5/dist/js/tom-select.complete.min.js') }}"></script>

    <script>
        new TomSelect(".tags", {
            plugins: ['remove_button'],
            create: false,
            onItemAdd: function() {
                this.setTextboxValue('');
                this.refreshOptions();
            },
            render: {
                option: function(data, escape) {
                    return '<div class="d-flex w-100"><span>' + escape(data.value) +
                        '</span><span class="ms-auto text-muted">' + escape(data.description) + '</span></div>';
                },
                item: function(data, escape) {
                    return '<div>' + escape(data.value) + '</div>';
                }
            }
        });
    </script>
@endpush
