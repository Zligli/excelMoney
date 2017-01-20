@extends('layouts.app')

@section('content')

    @if($errors->first() == 'update') @php $update = ''; $create = 'hidden' @endphp @else @php $update = 'hidden'; $create = '' @endphp @endif
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


