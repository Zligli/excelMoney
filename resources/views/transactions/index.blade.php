@extends('layouts.app')

@section('content')
    @include('transactions.table')
@endsection
@section('script')
    @parent
    @include('scripts.table')
@endsection
