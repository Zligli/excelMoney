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
                    <td data-date="{{ $transaction->formated_date }}">{{ $transaction->formated_date }}</td>
                    <td data-price="{{ $transaction->price }}"
                        class="@if($transaction->category->type == 'cost') text-danger @else text-success @endif text-right">
                        {{ $transaction->formated_price }}</td>
                    <td data-category="{{ $transaction->category->id }}">{{ $transaction->category->name }}</td>
                    <td data-description="{{ $transaction->description }}">{{ $transaction->description }}</td>
                    <td>
                        <button class='btn btn-warning btn-block edit-button' type="button"
                                data-id='{{ $transaction->id }}'><i
                                    class='fa fa-pencil'></i></button>
                    </td>
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
