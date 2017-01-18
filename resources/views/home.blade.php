@extends('layouts.app')

@section('content')

    @include('transactions.balancenotification', ['balanceWarning' => $balanceWarning, 'balance' => $balance, 'bookBalance' => $bookBalance])

    <div class="row">
        <div class="col-md-5">
            @include('transactions.newform')
            @include('transactions.editform')
        </div>
        <div class="col-md-5 col-md-offset-1">
            @include('balance.form')
        </div>
    </div>

    @include('transactions.table')
    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.datepicker')
    @include('scripts.deleteconfirm')
    @include('scripts.editform')

@endsection
