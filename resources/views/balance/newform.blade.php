{!! Form::open(['method' => 'post', 'action' => 'BalanceController@store', 'class' => 'form-horizontal '.$create, 'id' => 'balance']) !!}
<fieldset>
    <legend>Unesi stanje</legend>
    <div class="form-group @if($errors->first('date')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Datum</label>
        <div class="col-lg-9">
            <input class="form-control" id="date" placeholder="Datum" name="date" value="{{ $currentDate }}"
                   data-date-end-date="0d" readonly="" required>
        </div>
    </div>
    <div class="form-group">
        @forelse($accounts as $account)
            <label for="select" class="col-lg-3 control-label">{{ $account->name }}</label>
            <div class="col-lg-9">
                <div class="input-group @if($errors->first('accounts['. $account->id .'][amount]')) has-error @endif">
                    <span class="input-group-addon">DIN</span>
                    <input class="form-control" placeholder="Iznos" type="number"
                           name="accounts[{{ $account->id }}][amount]"
                           value="@if($balance){{ $balance->getAmountByAccountId($account->id) }}@else  @endif"
                           required step="any">
                </div>
            </div>
        @empty
            <label for="date" class="col-lg-3 control-label">Accounts</label>
            <div class="col-lg-9">
                No active accounts
            </div>
        @endforelse
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary" form="balance">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}