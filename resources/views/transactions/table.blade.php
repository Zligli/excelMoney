<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <legend>Transakcije</legend>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Cena</th>
                <th>Kategorija</th>
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
                    <td>{{ $transaction->category->name }}</td>
                    <td>{{ $transaction->description }}</td>
                    <td><a class='btn btn-warning btn-block'
                           href='{{ action("TransactionController@edit", ["id" => $transaction->id]) }}'><i
                                    class='fa fa-pencil'></i></a></td>
                    <td>
                        {!! Form::open([ 'method'  => 'delete', 'action' => ['TransactionController@destroy', $transaction->id], 'id' => 'delete_'.$transaction->id]) !!}
                        <button type="button" class="btn btn-danger btn-block delete" data-toggle="modal"
                                data-target="#modal-delete" data-id="{{ $transaction->id }}"><i class="fa fa-trash"></i>
                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
