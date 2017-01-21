@extends('layouts.app')

@section('content')

    @if($errors->first() == 'update') @php $update = ''; $create = 'hidden' @endphp @else @php $update = 'hidden'; $create = '' @endphp @endif
    <div class="row">
        <div class="col-md-5">
            @include('transactions.newform')
            @include('transactions.editform')
        </div>
        <div class="col-md-5 col-md-offset-1">
            @include('balance.newform')
        </div>
    </div>
    <div class="row">
        @include('transactions.balancenotification')
    </div>

    @include('transactions.table')
    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.datepicker')

@endsection
