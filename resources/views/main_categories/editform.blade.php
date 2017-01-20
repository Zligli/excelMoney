{!! Form::open(['method' => 'put', 'action' => ['MainCategoryController@update', ''], 'class' => 'form-horizontal edit-form hidden']) !!}
<fieldset class="has-warning">
    <legend class="text-warning">Izmeni glavnu kategoriju</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="edit-name" class="col-lg-3 control-label">Ime</label>
        <div class="col-lg-9">
            <input class="form-control" id="edit-name" placeholder="Ime" type="text" name="name"
                   value="{{ old('name') }}">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="button" class="btn btn-default cancel-edit">Cancel</button>
            <button type="submit" class="btn btn-primary" id="edit-submit">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}