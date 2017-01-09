@extends('layouts.app')

@section('content')

    @include('transactions.balancenotification', ['balanceWarning' => $balanceWarning, 'balance' => $balance, 'bookBalance' => $bookBalance])

    <div class="row">
        <div class="col-md-5">
            {!! Form::open(['method' => 'post', 'action' => 'TransactionController@store', 'class' => 'form-horizontal', 'id' => 'transaction']) !!}
            <fieldset>
                <legend>Nov Trošak</legend>
                <div class="form-group @if($errors->first('date')) has-error @endif">
                    <label for="date" class="col-lg-3 control-label">Datum</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="date" placeholder="Datum" type="date" name="date"
                               data-date-end-date="0d" value="{{ $currentDate }}">
                    </div>
                </div>
                <div class="form-group @if($errors->first('price')) has-error @endif">
                    <label for="price" class="col-lg-3 control-label">Iznos</label>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <span class="input-group-addon">DIN</span>
                            <input class="form-control" id="price" placeholder="Iznos" type="number" name="price" step="any">
                        </div>
                    </div>
                </div>
                <div class="form-group @if($errors->first('description')) has-error @endif">
                    <label for="description" class="col-lg-3 control-label">Opis</label>
                    <div class="col-lg-9">
                        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
                        <span class="help-block">Duži opis ostvarene transakcije.</span>
                    </div>
                </div>
                <div class="form-group @if($errors->first('category_id')) has-error @endif">
                    <label for="select" class="col-lg-3 control-label">Kategorija</label>
                    <div class="col-lg-9">
                        {!! Form::select('category_id', $groupedCategories, null, ['class' => "form-control",  'id '=> "select"]) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary" form="transaction">Submit</button>
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
    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.datepicker')
    @include('scripts.deleteconfirm')

@endsection
