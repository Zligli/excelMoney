{!! Form::open(['method' => 'post', 'action' => 'BalanceController@store', 'class' => 'form-horizontal']) !!}
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
        <label for="date" class="col-lg-3 control-label">Datum</label>
        <div class="col-lg-9">
            <input class="form-control" id="date" placeholder="Datum" type="text" name="date" value="{{ $currentDate }}"
                   disabled="" required>
        </div>
    </div>
    <div class="form-group">
        @foreach($accounts as $account)
            <label for="select" class="col-lg-3 control-label">{{ $account->name }}</label>
            <div class="col-lg-9">
                <div class="input-group">
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
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}