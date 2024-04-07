<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.deleteCompany').click(function () {
            let company_id = $(this).data('id');
            let companyDiv = $(this).closest('.col-md-6.col-xl-4');


            Swal.fire({
                title: 'Firmanızı silmek istediğinizden emin misiniz?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Evet',
                cancelButtonText: 'İptal',
                customClass: {
                    confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                    cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('company.delete') }}",
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: company_id
                        },
                        success: (response) => {
                            console.log(response);
                            if (response.code === 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Silindi!',
                                    text: 'Firmanız başarıyla silindi.',
                                    customClass: {
                                        confirmButton: 'btn btn-success waves-effect waves-light'
                                    }
                                }).then(() => {
                                    companyDiv.fadeOut(1000, function () {
                                        $(this).remove();
                                    });
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script>
