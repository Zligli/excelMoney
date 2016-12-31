@extends('layouts.app')

@section('content')
    <div class="container">
        @include('transactions.table')
    </div>
@endsection
@section('script')
    @parent
    {{--@include('scripts.transactionstable')--}}
@endsection
