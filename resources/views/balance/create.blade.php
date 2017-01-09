@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            @include('balance.form')
        </div>
    </div>

@endsection

@section('script')
    @parent
    @include('scripts.datepicker')

@endsection
