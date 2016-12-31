<script>
    $('#dataTable').DataTable({
        data: {!! $transactions !!},
        columns: [
            {data: 'id'},
            {data: 'type'},
            {data: 'formated_date'},
            {data: 'category_name'},
            {data: 'formated_price'},
            {data: 'description'},
            {
                data: function (item) {
                    return "<a class='btn btn-warning btn-block' href='transactions/" + item.id +"/edit'><i class='fa fa-pencil'></i></a>";
                }
            },
            {
                data: function (item) {
                    return "<span class='confirm btn btn-danger btn-block' id='" + item.id + "' data-type = 'items'> <i class='fa fa-trash'></i></span>";
                }
            }
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
</script>
