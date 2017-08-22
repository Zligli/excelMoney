<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="row form-horizontal">
            {!! Form::open(['method' => 'GET', 'action' => 'HomeController@index', 'id' => 'filter']) !!}

            <div class="col-lg-3">
                {!! Form::select('category_filter[]', $groupedCategories, array_get($filters, 'category_filter'), ['class' => "form-control",  'id '=> "select",  "multiple" => "multiple"]) !!}
            </div>
            <div class="col-lg-4">
                <div class="date-range input-daterange  input-group" data-date-end-date="0d">
                    {!! Form::text('from_date', Input::get('from_date'), ["class" => "input-sm form-control", "placeholder" => "From date"]) !!}
                    <span class="input-group-addon">to</span>
                    {!! Form::text('to_date', Input::get('to_date'), ["class" => "input-sm form-control", "placeholder" => "To date"]) !!}
                </div>
            </div>
            <div class="col-lg-3">
                {!! Form::text('search_filter',Input::get('search_filter'), ["class" => "input-sm form-control", "placeholder" => "Search"]) !!}
            </div>
            <div class="col-lg-2">
                <button type="submit" class="btn btn-primary btn-sm" form="filter">Filter</button>
            </div>
            {!! Form::close() !!}
        </div>
        <hr>
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
                                data-id='{{ $transaction->id }}'><i class='fa fa-pencil'></i>
                        </button>
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
        {{ $transactions->appends(\Input::all())->links() }}
    </div>
</div>
