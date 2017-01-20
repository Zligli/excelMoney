@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            @include('main_categories.newform')
            @include('main_categories.editform')
        </div>
    </div>

    @include('main_categories.table')

    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection


