{!! Form::open(['method' => 'put', 'action' => ['AccountController@update', ''], 'class' => 'form-horizontal hidden']) !!}
<fieldset>
    <legend>Izmeni račun</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Ime</label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="Ime" type="text" name="name" value="">
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
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}