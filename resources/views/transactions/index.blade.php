@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-hover " id="dataTable">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Datum</th>
                        <th>Vrsta</th>
                        <th>Cena</th>
                        <th>Opis</th>
                        <th>Stanje</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script>
        $('#dataTable').DataTable({
            data: {!! $transactions !!},
            columns: [
                {data: 'id'},
                {data: 'date'},
                {data: 'category_name'},
                {data: 'formated_price'},
                {data: 'description'},
                {data: 'saldo'}
            ],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                    "searchable": false
                }
            ],
            "order": [[0, "desc"]]
        });
    </script>
@endsection
