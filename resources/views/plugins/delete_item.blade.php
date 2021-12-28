@push('page.js')
    <script>
        $('body').on('click', '.delete-item', function () {
            const url = $(this).attr('data-href');
            swal.fire({
                title: "{{ __('Pozmak isleýärsiňizmi?') }}",
                text: "{{ __('Saýlan maglumatyňyzy hakykatdan hem pozmak isleýärsiňizmi?') }}",
                type: "question",
                showCancelButton: true,
                confirmButtonText: "{{ __('Hawa') }}",
                cancelButtonText: "{{ __('Ýok') }}",
                onOpen: () => Swal.getCancelButton().focus()
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (response) {
                            if (response.success) {
                                $('#datatable').DataTable().ajax.reload();
                                toastr.success(response.success);
                            } else {
                                toastr.error(response.error);
                            }
                        },
                        error: function (response) {
                            toastr.error(response.statusText);
                        }
                    });
                }
            });
        });
    </script>
@endpush
