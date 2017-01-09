@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            {!! Form::open(['method' => 'post', 'action' => 'ImportController@importAll', 'class' => 'form-horizontal', 'files' => true]) !!}
            <fieldset>
                <legend>Import excel</legend>
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
