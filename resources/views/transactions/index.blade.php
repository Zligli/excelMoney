@extends('layouts.app')

@section('content')

    @include('transactions.table')
    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection
