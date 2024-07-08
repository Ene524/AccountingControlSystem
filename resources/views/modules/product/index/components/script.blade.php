<script src="{{asset('assets/js/ag-grid-enterprise.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<script>
    $(document).ready(function () {
        getCustomers();
    });

    var columnDefs = [
        {
            headerName: '#',
            field: 'id',
            sortable: true,
            filter: 'agTextColumnFilter',
            checkboxSelection: true,
            headerCheckboxSelection: true,
            headerCheckboxSelectionFilteredOnly: true,
            width: 100,
        },
        {
            headerName: 'Kodu',
            field: 'code',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Adı',
            field: 'name',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 150,
        },
        {
            headerName: 'Açıklama',
            field: 'description',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 150,
        },
        {
            headerName: 'Tür',
            field: 'type',
            sortable: true,
            filter: 'agSetColumnFilter',
            width: 200,
            cellRenderer: productType,
            filterParams: {
                values: ['1', '2'],
                cellRenderer: productType,
                valueFormatter: function (params) {
                    return params.value === '1' ? 'Malzeme' : 'Hizmet';
                },
                textCustomComparator: function (filter, value, filterText) {
                    return value === filterText;
                }
            },
        },
        {
            headerName: 'Satış Fiyatı',
            field: 'sell_price',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 160,
        },
        {
            headerName: 'Alış Fiyatı',
            field: 'purchase_price',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 160,
        },
        {
            headerName: 'Birim',
            field: 'unit_id',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 160,
        },
        {
            headerName: 'Kdv',
            field: 'vat',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 100,
        },
        {
            headerName: 'Barkod',
            field: 'barcode',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Tevkifatlı mı?',
            field: 'is_witholding',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Tevkifat Kodu',
            field: 'witholding_id',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Vergi Muafiyet Kodu',
            field: 'tax_exemption_id',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Ek Vergi Kodu',
            field: 'tax_id',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Özel Kodu1',
            field: 'specode1',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Özel Kodu2',
            field: 'specode2',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Özel Kodu3',
            field: 'specode3',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Oluşturulma Tarihi',
            field: 'created_at',
            sortable: true,
            filter: 'agDateColumnFilter',
            width: 200,
        },
        {
            headerName: 'Güncelleme Tarihi',
            field: 'updated_at',
            sortable: true,
            filter: 'agDateColumnFilter',
            width: 200,
        },
    ];

    var gridOptions = {
        columnDefs: columnDefs,
        defaultColDef: {
            enableRowGroup: true,
            enableValue: true,
            sortable: true,
            filter: true,
            resizable: true,

        },
        //enableRangeSelection: true,
        allowContextMenuWithControlKey: true,
        getContextMenuItems: getContextMenuItems,
        floatingFilter: true,
        rowSelection: 'single',
        statusBar: {
            statusPanels: [
                {statusPanel: 'agTotalRowCountComponent', align: 'left'},
                {statusPanel: 'agFilteredRowCountComponent'},
                {statusPanel: 'agSelectedRowCountComponent'},
                {
                    statusPanel: 'agAggregationComponent',
                    statusPanelParams: {
                        // possible values are: 'count', 'sum', 'min', 'max', 'avg'
                        aggFuncs: ['count', 'sum']
                    }
                }
            ]
        },

    };

    function productType(params) {
        if (params.value === "" || params.value === undefined || params.value === null) {
            return '';
        } else {
            var title = "";
            var color = "";

            if (params.value == "1") {
                color = "success";
                title = "Malzeme";
            }
            if (params.value == "2") {
                color = "primary";
                title = "Hizmet";
            }

            var actions = '<span class="badge bg-' + color + '  badge-pill">' + title + '</span>';
            return actions;
        }
    }

    function getContextMenuItems(params) {
        var result = [
            {
                name: 'Düzenle',
                action: function () {
                    window.location = '/product/edit/' + params.node.data.id;
                }
            },
            {
                name: 'Sil',
                action: function () {
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
                                url: "{{ route('product.delete') }}",
                                type: 'DELETE',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: params.node.data.id
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
                                            const sel = gridOptions.api.getSelectedRows();
                                            gridOptions.api.applyTransaction({remove: sel});
                                        });
                                    }

                                }
                            });

                        }
                    });
                }
            },
            'separator',
            'copy',
            'export'
        ];

        return result;
    }

    document.addEventListener('DOMContentLoaded', function () {
        var gridDiv2 = document.querySelector('#myGrid');
        new agGrid.Grid(gridDiv2, gridOptions);
    });

    function getCustomers() {
        $.ajax({
            url: '{{route('product.getCustomers')}}',
            type: 'GET',
            success: function (response) {
                gridOptions.api.setRowData(response.response);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>

