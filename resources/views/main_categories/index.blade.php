@extends('layouts.app')

@section('content')

    @if($errors->first() == 'update') @php $update = ''; $create = 'hidden' @endphp @else @php $update = 'hidden'; $create = '' @endphp @endif
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

@endsection


