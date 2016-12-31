@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'post', 'action' => 'AccountController@store', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Kreiraj račun</legend>
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
                        <label for="date" class="col-lg-3 control-label">Ime</label>
                        <div class="col-lg-9">
                            <input class="form-control" placeholder="Ime" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-3 control-label">Tip</label>
                        <div class="col-lg-9">
                            {!! Form::select('type', ['cash' => 'Keš', 'bank' => 'Banka'], null, ['class' => "form-control"]) !!}
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
@endsection
