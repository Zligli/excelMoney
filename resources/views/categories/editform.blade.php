{!! Form::open(['method' => 'put', 'action' => ['CategoryController@update', ''], 'class' => 'form-horizontal hidden']) !!}
<fieldset>
    <legend>Izmeni kategoriju</legend>
    <div class="form-group @if($errors->first('name')) has-error @endif">
        <label for="date" class="col-lg-2 control-label">Ime</label>
        <div class="col-lg-10">
            <input class="form-control" placeholder="Ime" type="text" name="name"
                   value="">
        </div>
    </div>
    <div class="form-group @if($errors->first('type')) has-error @endif">
        <label for="select" class="col-lg-2 control-label">Tip</label>
        <div class="col-lg-10">
            {!! Form::select('type', ['cost' => 'Troškovi','income' => 'Prihodi'], null, ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="form-group @if($errors->first('main_category_id')) has-error @endif">
        <label for="select" class="col-lg-2 control-label">Glavna Kategorija</label>
        <div class="col-lg-10">
            {!! Form::select('main_category_id', $main_categories, null, ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <a href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}