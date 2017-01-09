@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                {!! Form::open(['method' => 'post', 'action' => 'TransactionController@store', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Nov Trošak</legend>
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
                        <label for="date" class="col-lg-3 control-label">Datum</label>
                        <div class="col-lg-9">
                            <input class="form-control" id="date" placeholder="Datum" type="date" name="date"
                                   data-date-end-date="0d">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price" class="col-lg-3 control-label">Iznos</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-addon">DIN</span>
                                <input class="form-control" id="price" placeholder="Iznos" type="number" name="price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-lg-3 control-label">Opis</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                            <span class="help-block">Duži opis ostvarene transakcije.</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-3 control-label">Kategorija</label>
                        <div class="col-lg-9">
                            {!! Form::select('category_id', $groupedCategories, null, ['class' => "form-control",  'id '=> "select"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
            </div>
            <div class="col-md-5 col-md-offset-1">
                @include('balance.form')
            </div>
        </div>
        @include('transactions.table')
    </div>
@endsection
@section('script')
    @parent
    @include('scripts.datepicker')
@endsection
