{!! Form::open(['method' => 'post', 'action' => 'CategoryController@store', 'class' => 'form-horizontal new-form']) !!}
<fieldset>
    <legend>Kreiraj kategoriju</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Ime</label>
        <div class="col-lg-9">
            <input class="form-control" placeholder="Ime" type="text" name="name" value="{{ old('name') }}">
        </div>
    </div>
    <div class="form-group @if($errors->first('type')) has-error @endif">
        <label for="select" class="col-lg-3 control-label">Tip</label>
        <div class="col-lg-9">
            {!! Form::select('type', ['cost' => 'Troškovi','income' => 'Prihodi'], old('type'), ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="form-group @if($errors->first('main_category_id')) has-error @endif">
        <label for="select" class="col-lg-3 control-label">Glavna Kategorija</label>
        <div class="col-lg-9">
            {!! Form::select('main_category_id', $main_categories, old('main_category_id'), ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}