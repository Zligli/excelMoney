@extends('layouts.app')

@section('content')
    
    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            @include('balance.newform')
        </div>
    </div>

    @include('balance.table')

@endsection

@section('script')
    @parent

@endsection


