{!! Form::open(['method' => 'put', 'action' => ['AccountController@update', ''], 'class' => 'form-horizontal edit-form '.$update]) !!}
<fieldset class="has-warning">
    <legend class="text-warning">Izmeni račun</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="edit-name" class="col-lg-3 control-label">Ime</label>
        <div class="col-lg-9">
            <input id="edit-name" class="form-control" placeholder="Ime" type="text" name="name"
                   value="{{ old('name') }}">
        </div>
    </div>
    <div class="form-group @if($errors->first('type')) has-error @endif">
        <label for="edit-type" class="col-lg-3 control-label">Tip</label>
        <div class="col-lg-9">
            {!! Form::select('type', ['cash' => 'Keš', 'bank' => 'Banka'], old('type'), ['class' => "form-control", 'id' => "edit-type"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="reset" class="btn btn-default cancel-edit">Cancel</button>
            <button type="submit" class="btn btn-primary" id="edit-submit">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}