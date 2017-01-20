{!! Form::open(['method' => 'put', 'action' => ['CategoryController@update', ''], 'class' => 'form-horizontal edit-form hidden']) !!}
<fieldset class="has-warning">
    <legend class="text-warning">Izmeni kategoriju</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="edit-name" class="col-lg-2 control-label">Ime</label>
        <div class="col-lg-10">
            <input class="form-control" id="edit-name" placeholder="Ime" type="text" name="name"
                   value="{{ old('name') }}">
        </div>
    </div>
    <div class="form-group @if($errors->first('type')) has-error @endif">
        <label for="edit-type" class="col-lg-2 control-label">Tip</label>
        <div class="col-lg-10">
            {!! Form::select('type', ['cost' => 'Troškovi','income' => 'Prihodi'], old('type'), ['class' => "form-control", 'id' => 'edit-type']) !!}
        </div>
    </div>
    <div class="form-group @if($errors->first('main_category_id')) has-error @endif">
        <label for="edit-main_category_id" class="col-lg-2 control-label">Glavna Kategorija</label>
        <div class="col-lg-10">
            {!! Form::select('main_category_id', $main_categories, old('main_category_id'), ['class' => "form-control", 'id' => 'edit-main_category_id']) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="reset" class="btn btn-default cancel-edit">Cancel</button>
            <button type="submit" class="btn btn-primary" id="edit-submit">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}