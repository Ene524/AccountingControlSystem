<script src="{{asset('assets/js/ag-grid-enterprise.js')}}"></script>


<script>
    $(document).ready(function () {
        getCustomerList();
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
            headerName: 'Ünvan',
            field: 'title',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Vergi Numarası',
            field: 'tax_number',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 150,
        },
        {
            headerName: 'Tc Kimlik Numarası',
            field: 'identity_number',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 150,
        },
        {
            headerName: 'Durum',
            field: 'is_active',
            sortable: true,
            filter: 'agSetColumnFilter',
            width: 200,
            cellRenderer: customerActive,
            filterParams: {
                values: ['1', '0'],
                cellRenderer: customerActive,
                valueFormatter: function (params) {
                    return params.value === '1' ? 'Aktif' : 'Pasif';
                },
                textCustomComparator: function (filter, value, filterText) {
                    return value === filterText;
                }
            },
        },
        {
            headerName: 'Müşteri Tipi',
            field: 'is_person',
            sortable: true,
            filter: 'agSetColumnFilter',
            width: 200,
            cellRenderer: customerType,
            filterParams: {
                values: ['1', '0'],
                cellRenderer: customerType,
                valueFormatter: function (params) {
                    return params.value === '1' ? 'Şahıs Firması' : 'Tüzel Firma';
                },
                textCustomComparator: function (filter, value, filterText) {
                    return value === filterText;
                }
            },
        },
        {
            headerName: 'Adı',
            field: 'name',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 160,
        },
        {
            headerName: 'Soyadı',
            field: 'surname',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 160,
        },
        {
            headerName: 'Telefon',
            field: 'phone',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Email',
            field: 'email',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Adres',
            field: 'address',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Şehir',
            field: 'city',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Ülke',
            field: 'country',
            sortable: true,
            filter: 'agTextColumnFilter',
            width: 200,
        },
        {
            headerName: 'Posta Kodu',
            field: 'postal_code',
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

    function customerType(params) {
        if (params.value === "" || params.value === undefined || params.value === null) {
            return '';
        } else {
            var title = "";
            var color = "";

            if (params.value == "1") {
                color = "primary";
                title = "Şahıs Firması";
            }
            if (params.value == "0") {
                color = "info";
                title = "Tüzel Firma";
            }

            var actions = '<span class="badge bg-' + color + '  badge-pill">' + title + '</span>';
            return actions;
        }
    }

    function customerActive(params) {
        if (params.value === "" || params.value === undefined || params.value === null) {
            return '';
        } else {
            var title = "";
            var color = "";

            if (params.value == "1") {
                color = "success";
                title = "Aktif";
            }
            if (params.value == "0") {
                color = "danger";
                title = "Pasif";
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
                    console.log(params.node.data.id);
                    //window.location = '/Customer/Edit?id=' + params.node.data.id + '';
                }
            },
            {
                name: 'Sil',
                action: function () {
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

    function getCustomerList() {
        $.ajax({
            url: '{{route('customer.getCustomers')}}',
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
