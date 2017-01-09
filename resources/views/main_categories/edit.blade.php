@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            {!! Form::open(['method' => 'put', 'action' => ['MainCategoryController@update', $main_category->id], 'class' => 'form-horizontal']) !!}
            <fieldset>
                <legend>Izmeni glavnu kategoriju</legend>
                <div class="form-group @if($errors->first('name')) has-error @endif">
                    <label for="date" class="col-lg-3 control-label">Ime</label>
                    <div class="col-lg-9">
                        <input class="form-control" placeholder="Ime" type="text" name="name"
                               value="{{ $main_category->name }}">
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

@endsection

@section('script')
    @parent
@endsection
