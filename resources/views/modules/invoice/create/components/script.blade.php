<script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script>
    $(document).ready(function () {
        getCustomers();
        getCurrencies();
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
                "items": JSON.stringify(getInvoiceItems()), // Fatura kalemlerini JSON formatında gönderiyoruz
                "tax": $("#tax").val(),
                "note": $("#note").val(),
            },
            success: function (response) {
                console.log(response);
            }
        })
    });


    function getInvoiceItems() {
        var items = [];
        $("#invoiceLine tbody tr").each(function () {
            var item = {
                "product_id":$(this).find(".product_id").val(),
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
            async: false,
            url: '{{ route('customer.getCustomers') }}',
            type: 'GET',
            success: function (data) {
                for (var i = 0; i < data.response.length; i++) {
                    var option = "<option value='" + data.response[i].id + "'>" + data.response[i].title + "</option>";
                    $('#customer_id').append(option).trigger('change');
                }
            }
        });
    }

    function getCurrencies() {
        $.ajax({
            async: false,
            url: '{{ route('common.getCurrencies') }}',
            type: 'GET',
            success: function (data) {
                for (var i = 0; i < data.response.length; i++) {
                    var option = "<option value='" + data.response[i].id + "'>" + data.response[i].name + "</option>";
                    $('#currency_id').append(option).trigger('change');
                }
            }
        });
    }

    function addInvoiceLine() {
        var newRow = document.createElement('tr');

        newRow.innerHTML = `
        <td>
            <select class="form-control form-control-sm product_id">
                <option value="1">Item 1</option>
                <option value="2">Item 2</option>
            </select>
        </td>
        <td>
            <input type="number" class="form-control form-control-sm quantity" placeholder="Quantity" name="quantity">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm price" placeholder="Price" name="price">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm vat" placeholder="Vat" name="Vat">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm description" placeholder="Description" name="Description">
        </td>
        <td>
            <input type="number" class="form-control form-control-sm total" placeholder="Total" name="Total" readonly="">
        </td>
        <td>
            <span style="text-align:center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger btn-sm" onclick="deleteRow(this)" type="button"><i class="fa-solid fa-trash"></i></button></span>
        </td>
    `;
        document.querySelector('#invoiceLine tbody').appendChild(newRow);
    }

    function deleteRow(button) {
        $(button).closest('tr').remove();
    }
</script>



