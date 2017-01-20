@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            @include('accounts.newform')
            @include('accounts.editform')
        </div>
    </div>

    @include('accounts.table')

    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection


