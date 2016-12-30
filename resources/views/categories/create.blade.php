@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'post', 'action' => 'CategoryController@store', 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Kreiraj kategoriju</legend>
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
                        <label for="date" class="col-lg-2 control-label">Ime</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="date" placeholder="Ime" type="text" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Tip</label>
                        {!! Form::select('type', ['cost' => 'Troškovi','income' => 'Prihodi'], null, ['class' => "form-control"]) !!}
                    </div>
                    <div class="form-group">
                        <label for="select" class="col-lg-2 control-label">Glavna Kategorija</label>
                        {!! Form::select('main_category_id', $main_categories, null, ['class' => "form-control"]) !!}
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
@endsection
