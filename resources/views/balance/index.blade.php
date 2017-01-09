@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <legend>Balances</legend>
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Datum</th>
                    <th>Iznos</th>
                </tr>
                </thead>
                <tbody>
                @foreach($balances as $balance)
                    <tr>
                        <td>{{ $balance->formated_date }}</td>
                        <td>{{ $balance->amount_sum }} RSD</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $balances->links() }}
        </div>
    </div>

@endsection

@section('script')
    @parent

@endsection


