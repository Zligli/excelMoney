<script>
    $('#dataTable').DataTable({
        data: {!! $transactions !!},
        columns: [
            {data: 'id'},
            {data: 'type'},
            {data: 'formated_date'},
            {data: 'category_name'},
            {data: 'formated_price'},
            {data: 'description'}
        ],
        createdRow: function (row, data, dataIndex) {
            if (data['type'] == "cost") {
                $(row.cells[2]).addClass('text-danger');
            } else {
                $(row.cells[2]).addClass('text-success');
            }
        },
        columnDefs: [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            },
            {
                "targets": [1],
                "visible": false,
                "searchable": true
            }
        ],
        order: [[2, "desc"]]
    });
    $('#date').datepicker({
        clearBtn: true,
        autoclose: true,
        todayBtn: "linked"
    });
</script>
