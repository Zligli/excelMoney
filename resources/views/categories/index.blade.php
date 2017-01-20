@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            @include('categories.newform')
            @include('categories.editform')
        </div>
    </div>

    @include('categories.table')

    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')
    @include('scripts.editform')

@endsection


