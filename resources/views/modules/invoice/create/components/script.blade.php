<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script>
    $(document).ready(function () {
        getCustomers();
    });

    $("#saveInvoice").click(function () {
        $.ajax({
            url: '{{route('invoice.create')}}',
            type: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                "customer_id": $("#customer_id").val(),
                "invoice_type": $("#invoice_type").val(),
                "invoice_date": $("#invoice_date").val(),
                "due_date": $("#due_date").val(),
                "invoice_number": $("#invoice_number").val(),
                "category_id": $("#category_id").val(),
                "currency_id": $("#currency_id").val(),
                "total_amount": $("#total_amount").val(),
                "items": JSON.stringify(getInvoiceLines()), // Fatura kalemlerini JSON formatında gönderiyoruz
                "tax": $("#tax").val(),
                "note": $("#note").val(),
            },
            success: function (response) {
                console.log(response);
            }
        })
    });

    function getInvoiceLines() {
        var items = [];
        $("#invoiceLine").each(function () {
            var item = {
                "quantity": $(this).find(".quantity").val(),
                "price": $(this).find(".price").val(),
                "vat": $(this).find(".vat").val(),
                "total": $(this).find(".total").val(),
                "description": $(this).find(".description").val()
            };
            items.push(item);
        });
        return items;
    }

    function getCustomers() {
        $.ajax({
            url: '{{route('customer.getCustomers')}}',
            type: 'GET',
            success: function (response) {

            }
        })

    }
</script>



