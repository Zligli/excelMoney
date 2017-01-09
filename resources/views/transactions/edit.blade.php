@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'put', 'action' => ['TransactionController@update', $transaction->id], 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Izmeni Trošak</legend>
                    <div class="form-group @if($errors->first('date')) has-error @endif">
                        <label for="date" class="col-lg-3 control-label">Datum</label>
                        <div class="col-lg-9">
                            <input class="form-control" id="date" placeholder="Datum" type="date" name="date"
                                   data-date-end-date="0d" value="{{ $transaction->formated_date }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->first('price')) has-error @endif">
                        <label for="price" class="col-lg-3 control-label">Iznos</label>
                        <div class="col-lg-9">
                            <div class="input-group">
                                <span class="input-group-addon">DIN</span>
                                <input class="form-control" id="price" placeholder="Iznos" type="number" name="price"
                                       value="{{ $transaction->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group @if($errors->first('description')) has-error @endif">
                        <label for="description" class="col-lg-3 control-label">Opis</label>
                        <div class="col-lg-9">
                            <textarea class="form-control" rows="3" id="description"
                                      name="description">{{ $transaction->description }}</textarea>
                            <span class="help-block">Duži opis ostvarene transakcije.</span>
                        </div>
                    </div>
                    <div class="form-group @if($errors->first('category_id')) has-error @endif">
                        <label for="select" class="col-lg-3 control-label">Kategorija</label>
                        <div class="col-lg-9">
                            {!! Form::select('category_id', $groupedCategories, $transaction->category->id, ['class' => "form-control",  'id '=> "select"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">
                            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
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
    @include('scripts.datepicker')
@endsection
