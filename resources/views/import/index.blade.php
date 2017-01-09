@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            {!! Form::open(['method' => 'post', 'action' => 'ImportController@importAll', 'class' => 'form-horizontal', 'files' => true]) !!}
            <fieldset>
                <legend>Import excel</legend>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::file('file', ['class' => 'btn btn-info ']) !!}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Upload!', ['class' => 'btn btn-primary ']) !!}
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
