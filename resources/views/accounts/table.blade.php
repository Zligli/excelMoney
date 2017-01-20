<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <legend>Računi</legend>
        <table class="table table-striped table-hover ">
            <thead>
            <tr>
                <th>Naziv</th>
                <th>Tip</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($accounts as $account)
                <tr>
                    <td>{{ $account->name }}</td>
                    <td>@if($account->type == "bank") Banka @else Keš @endif</td>
                    <td><a class='btn btn-warning btn-block'
                           href='{{ action("AccountController@edit", ["id" => $account->id]) }}'><i
                                    class='fa fa-pencil'></i></a></td>
                    <td>
                        {!! Form::open([ 'method'  => 'delete', 'action' => ['AccountController@destroy', $account->id], 'id' => 'delete_'.$account->id]) !!}
                        <button type="button" class="btn btn-danger btn-block delete" data-toggle="modal"
                                data-target="#modal-delete" data-id="{{ $account->id }}"><i class="fa fa-trash"></i>
                        </button>
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $accounts->links() }}
    </div>
</div>