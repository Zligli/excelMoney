@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'post', 'action' => 'TransactionController@store', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Nov Trošak</legend>
                    <div class="form-group">
                        <label for="date" class="col-lg-2 control-label">Datum</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="date" placeholder="Datum" type="date" name="date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-lg-2 control-label">Iznos</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="price" placeholder="Iznos" type="number" name="price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Opis</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                            <span class="help-block">Duži opis ostvarene transakcije.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Kategorija</label>
                        {!! Form::select('category_id', $groupedCategories, null, ['class' => "form-control",  'id '=> "select"]) !!}
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
        </div>

        {{--Transaction table--}}
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <legend>Troškovi</legend>
                <table class="table table-striped table-hover " id="dataTable">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>type</th>
                        <th>Datum</th>
                        <th>Vrsta</th>
                        <th>Cena</th>
                        <th>Opis</th>
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
@endsection
