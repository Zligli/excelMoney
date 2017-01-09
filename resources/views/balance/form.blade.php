{!! Form::open(['method' => 'post', 'action' => 'BalanceController@store', 'class' => 'form-horizontal', 'id' => 'balance']) !!}
<fieldset>
    <legend>Unesi stanje</legend>
    <div class="form-group @if($errors->first('date')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Datum</label>
        <div class="col-lg-9">
            <input class="form-control" id="date" placeholder="Datum" type="text" name="date" value="{{ $currentDate }}"
                   data-date-end-date="0d" readonly="" required>
        </div>
    </div>
    <div class="form-group">
        @foreach($accounts as $account)
            <label for="select" class="col-lg-3 control-label">{{ $account->name }}</label>
            <div class="col-lg-9">
                <div class="input-group @if($errors->first('accounts['. $account->id .'][amount]')) has-error @endif">
                    <span class="input-group-addon">DIN</span>
                    <input class="form-control" placeholder="Iznos" type="number"
                           name="accounts[{{ $account->id }}][amount]"
                           value="{{ $balance->getAmountByAccountId($account->id) }}" required>
                </div>
            </div>
        @endforeach
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary" form="balance">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}