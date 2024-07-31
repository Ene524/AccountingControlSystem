<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script>
    $(document).ready(function () {
        var cariList = [];

        $.ajax({
            url: '{{ route('customer.getCustomers') }}',
            type: 'GET',
            success: function (response) {

                // Response'u uygun formata dönüştür
                if (response && Array.isArray(response.response)) {
                    cariList = response.response.map(function (customer) {
                        return {
                            id: customer.id,
                            text: customer.title,
                            tax_number: customer.tax_number,
                            tax_office: customer.tax_office,
                            address: customer.address,
                            city: customer.city,
                            town: customer.town,
                            country: customer.country
                        };
                    });
                } else {
                    console.error("Unexpected response format or response.response is not an array");
                }

                $('#cariSelect').select2({
                    data: [{id: '{{null}}', text: 'Seçiniz'}].concat(cariList),
                    dropdownParent: $('#cariCard')
                });
            },
            error: function (xhr, status, error) {
                console.error('AJAX request failed:', error);
            }
        });

        $('#cariCard').on('click', function () {
            $('#cariSelectContainer').show();
            $('#cariSelect').select2('open');
        });

        $('#cariSelect').on('select2:select', function (e) {
            if (e.params.data.id === '{{null}}') {
                return;
            } else {
                var selectedData = e.params.data;
                $('#cariInfo').html(`
            <p><strong>Firma:</strong> ${selectedData.text}</p>
            <p><strong>VKN:</strong> ${selectedData.tax_number}</p>
            <p><strong>Vergi Dairesi:</strong> ${selectedData.tax_office}</p>
            <p><strong>Adres:</strong> ${selectedData.address}</p>
            <p><strong>Şehir:</strong> ${selectedData.city}</p>
            <p><strong>İlçe:</strong> ${selectedData.town}</p>
            <p><strong>Ülke:</strong> ${selectedData.country}</p>
        `);
                $('#cariSelectContainer').hide();
            }
        });
    });

    $("#saveInvoice").click(function () {
        $.ajax({
            url: '{{route('invoice.create')}}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                'invoice_number': "123123",
            },
            success: function (response) {
                console.log(response);
            }
        })
    });
</script>



