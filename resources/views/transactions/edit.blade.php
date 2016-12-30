@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'put', 'action' => ['TransactionController@update', $transaction->id], 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Izmeni Trošak</legend>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="date" class="col-lg-2 control-label">Datum</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="date" placeholder="Datum" type="date" name="date"
                                   data-date-end-date="0d" value="{{ $transaction->formated_date }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-lg-2 control-label">Iznos</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="price" placeholder="Iznos" type="number" name="price"
                                   value="{{ $transaction->price }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-2 control-label">Opis</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" rows="3" id="description"
                                      name="description">{{ $transaction->description }}</textarea>
                            <span class="help-block">Duži opis ostvarene transakcije.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Kategorija</label>
                        <div class="col-lg-10">
                            {!! Form::select('category_id', $groupedCategories, $transaction->category->id, ['class' => "form-control",  'id '=> "select"]) !!}
                        </div>
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
    </div>
@endsection
@section('script')
    @parent
    <script>
        $('#date').datepicker({
            clearBtn: true,
            autoclose: true,
            todayBtn: "linked"
        });
    </script>
@endsection
