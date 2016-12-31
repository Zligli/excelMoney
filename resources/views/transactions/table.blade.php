<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <legend>Transakcije</legend>
        <table class="table table-striped table-hover " id="dataTable">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Cena</th>
                <th>Opis</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->formated_date }}</td>
                    <td class="@if($transaction->category->type == 'cost') text-danger @else text-success @endif text-right"> {{ $transaction->formated_price }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td><a class='btn btn-warning btn-block'
                           href='{{ action("TransactionController@update", ["id" => $transaction->id]) }}'><i
                                    class='fa fa-pencil'></i></a></td>
                    <td><a class='btn btn-danger btn-block'
                           href='{{ action("TransactionController@destroy", ["id" => $transaction->id]) }}'><i
                                    class='fa fa-trash'></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $transactions->appends(['sort' => 'description'])->links() }}
    </div>
</div>
