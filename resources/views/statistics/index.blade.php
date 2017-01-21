@extends('layouts.app')

@section('content')

    {{--Mesecno--}}

    {{--Stack chart za svaki mesec po kategorijama u prethodnih 8 meseci--}}
    <div class="row">
        <div class="col-md-12">
            <div id="month-main-costs" style="height: 500px;"></div>
        </div>
    </div>


    {{--Stack chart Prihodi svakog meseca po kategorijama u prethodnih 8 meseci--}}
    <div class="row">
        <div class="col-md-12">
            <div id="month-main-incomes" style="height: 500px;"></div>
        </div>
    </div>

    {{--Line chart Stednja svakog meseca prethodnih 8 meseci--}}
    <div class="row">
        <div class="col-md-12">
            <div id="month-savings" style="height: 500px;"></div>
        </div>
    </div>

    {{--Line chart profit svakog meseca prethodnih 8 meseci--}}
    <div class="row">
        <div class="col-md-12">
            <div id="month-profit" style="height: 500px;"></div>
        </div>
    </div>


    {{--Godisnje--}}
    {{--Stack chart za svaku godinu sa osnovnim kategorijama--}}


@endsection

@section('script')
    @parent
    @include('scripts.echarts')

@endsection