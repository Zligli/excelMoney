{!! Form::open(['method' => 'post', 'action' => 'TransactionController@store', 'class' => 'form-horizontal new-form '.$create, 'id' => 'transaction']) !!}
<fieldset>
    <legend>Nov Trošak</legend>
    <div class="form-group @if($errors->first('date')) has-error @endif">
        <label for="date" class="col-lg-3 control-label">Datum</label>
        <div class="col-lg-9">
            <input class="form-control date" id="date" placeholder="Datum" name="date" data-date-end-date="0d"
                   value="{{ $currentDate }}">
        </div>
    </div>
    <div class="form-group @if($errors->first('price')) has-error @endif">
        <label for="price" class="col-lg-3 control-label">Iznos</label>
        <div class="col-lg-9">
            <div class="input-group">
                <span class="input-group-addon">DIN</span>
                <input class="form-control" id="price" placeholder="Iznos" type="number" name="price"
                       value="{{ old('price') }}" step="any">
            </div>
        </div>
    </div>
    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="description" class="col-lg-3 control-label">Opis</label>
        <div class="col-lg-9">
            <textarea class="form-control" rows="3" id="description"
                      name="description">{{ old('description') }}</textarea>
            <span class="help-block">Duži opis ostvarene transakcije.</span>
        </div>
    </div>
    <div class="form-group @if($errors->first('category_id')) has-error @endif">
        <label for="select" class="col-lg-3 control-label">Kategorija</label>
        <div class="col-lg-9">
            {!! Form::select('category_id', $groupedCategories, old('category_id'), ['class' => "form-control",  'id '=> "select"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary" form="transaction">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}