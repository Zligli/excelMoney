@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-5 col-md-offset-1">
                {!! Form::open(['method' => 'put', 'action' => ['BalanceController@update', $balance->id], 'class' => 'form-horizontal']) !!}
                <fieldset>
                    <legend>Unesi stanje</legend>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="date" class="col-lg-2 control-label">Datum</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="date" placeholder="Datum" type="text" name="date"
                                   value="{{ $balance->formated_date }}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        @foreach($accounts as $account)
                            <label for="select" class="col-lg-2 control-label">{{ $account->name }}</label>
                            <div class="col-lg-10">
                                <input class="form-control" placeholder="Iznos" type="number"
                                       name="accounts[{{ $account->id }}][amount]" value="{{ $balance->getAmountByAccountId($account->id) }}"
                                       required>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </fieldset>
                {!! Form::close() !!}
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
