<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

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

    function addInvoiceLine() {
        var row = '<tr class="invoice-row">' +
            '<td>' +
            '<select class="form-control form-control-sm product_id">' +
            '<option value="1">Item 1</option>' +
            '<option value="2">Item 2</option>' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<input type="number" class="form-control form-control-sm quantity" placeholder="Quantity">' +
            '</td>' +
            '<td>' +
            '<input type="number" class="form-control form-control-sm price" placeholder="Price">' +
            '</td>' +
            '<td>' +
            '<input type="number" class="form-control form-control-sm vat" placeholder="Vat">' +
            '</td>' +
            '<td>' +
            '<input type="text" class="form-control form-control-sm description" placeholder="Description">' +
            '</td>' +
            '<td>' +
            '<input type="number" class="form-control form-control-sm total" placeholder="Total">' +
            '</td>' +
            '<td>' +
            '<button type="button" class="btn btn-default btn-sm deleteRowBtn"  onclick="deleteInvoiceLine()" style="margin:0px;padding: 0px;height: 30px;width: 30px;"><i class="bx bx-x">-</i></button>' +
            '</td>' +
            '</tr>';
        $("#invoiceLine").append(row);
    }

    $(document).on("click", ".deleteRowBtn", function () {
        const rows = $("#invoiceLine tbody tr");
        if (rows.length > 1) {
            $(this).closest("tr").remove();
        } else {
            alert("En az bir fatura kalemi olmalıdır.");
        }
    });

</script>



