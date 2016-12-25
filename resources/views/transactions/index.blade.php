@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Vrsta</th>
                        <th>Cena</th>
                        <th>Opis</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->date }}</td>
                            <td>{{ $transaction->category->name }}</td>
                            <td>{{ $transaction->price }}</td>
                            <td>{{ $transaction->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $transactions->render() !!}
            </div>
        </div>
    </div>
@endsection
