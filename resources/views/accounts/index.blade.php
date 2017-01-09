@extends('layouts.app')

@section('content')

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
                            {!! Form::open([ 'method'  => 'delete', 'action' => ['AccountController@destroy', $account->id ] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger  btn-block delete']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $accounts->links() }}
        </div>
    </div>

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection


