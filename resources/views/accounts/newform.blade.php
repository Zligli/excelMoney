{!! Form::open(['method' => 'post', 'action' => 'AccountController@store', 'class' => 'form-horizontal new-form']) !!}
<fieldset>
    <legend>Kreiraj račun</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Ime</label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="Ime" type="text" name="name">
        </div>
    </div>
    <div class="form-group @if($errors->first('type')) has-error @endif">
        <label for="select" class="col-lg-3 control-label">Tip</label>
        <div class="col-lg-9">
            {!! Form::select('type', ['cash' => 'Keš', 'bank' => 'Banka'], null, ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}