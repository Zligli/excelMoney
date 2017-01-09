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
                {!! Form::open(['method' => 'put', 'action' => ['CategoryController@update', $category->id], 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Izmeni kategoriju</legend>
                    <div class="form-group @if($errors->first('name')) has-error @endif">
                        <label for="date" class="col-lg-2 control-label">Ime</label>
                        <div class="col-lg-10">
                            <input class="form-control" placeholder="Ime" type="text" name="name"
                                   value="{{ $category->name }}">
                        </div>
                    </div>
                    <div class="form-group @if($errors->first('type')) has-error @endif">
                        <label for="select" class="col-lg-2 control-label">Tip</label>
                        <div class="col-lg-10">
                            {!! Form::select('type', ['cost' => 'Troškovi','income' => 'Prihodi'], $category->type, ['class' => "form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group @if($errors->first('main_category_id')) has-error @endif">
                        <label for="select" class="col-lg-2 control-label">Glavna Kategorija</label>
                        <div class="col-lg-10">
                            {!! Form::select('main_category_id', $main_categories, $category->mainCategory->id, ['class' => "form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
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
@endsection
