@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <p class="alert alert-{{ $msg }}">{{ Session::get($msg) }}
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                </p>
            @endif
        @endforeach

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                @include('balance.form')
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
    <script>
        $('#date').datepicker({
            clearBtn: true,
            autoclose: true,
            todayBtn: "linked"
        });
    </script>
@endsection
