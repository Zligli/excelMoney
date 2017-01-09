@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            {!! Form::open(['method' => 'put', 'action' => ['BalanceController@update', $balance->id], 'class' => 'form-horizontal']) !!}
            <fieldset>
                <legend>Unesi stanje</legend>
                <div class="form-group @if($errors->first('date')) has-error @endif">
                    <label for="date" class="col-lg-3 control-label">Datum</label>
                    <div class="col-lg-9">
                        <input class="form-control" id="date" placeholder="Datum" type="text" name="date"
                               value="{{ $balance->formated_date }}" required>
                    </div>
                </div>
                <div class="form-group">
                    @forelse($accounts as $account)
                        <label for="select" class="col-lg-3 control-label">{{ $account->name }}</label>
                        <div class="col-lg-9">
                            <div class="input-group @if($errors->first('accounts['. $account->id . '][amount]')) has-error @endif">
                                <span class="input-group-addon">DIN</span>
                                <input class="form-control" placeholder="Iznos" type="number"
                                       name="accounts[{{ $account->id }}][amount]"
                                       value="{{ $balance->getAmountByAccountId($account->id) }}"
                                       required>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('script')
    @parent
    @include('scripts.datepicker')

@endsection
