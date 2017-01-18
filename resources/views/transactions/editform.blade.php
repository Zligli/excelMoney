{!! Form::open(['method' => 'put', 'action' => ['TransactionController@update', ''], 'class' => 'form-horizontal edit-transaction hidden']) !!}
<fieldset class="has-warning">
    <legend class="text-warning">Izmeni Trošak</legend>
    <div class="form-group @if($errors->first('date')) has-error @endif">
        <label for="edit-date" class="col-lg-3 control-label">Datum</label>
        <div class="col-lg-9">
            <input class="form-control date" id="edit-date" placeholder="Datum" type="date" name="date" value=""
                   data-date-end-date="0d">
        </div>
    </div>
    <div class="form-group @if($errors->first('price')) has-error @endif">
        <label for="edit-price" class="col-lg-3 control-label">Iznos</label>
        <div class="col-lg-9">
            <div class="input-group">
                <span class="input-group-addon">DIN</span>
                <input class="form-control" id="edit-price" placeholder="Iznos" type="number" name="price" value=""
                       step="any">
            </div>
        </div>
    </div>
    <div class="form-group @if($errors->first('description')) has-error @endif">
        <label for="edit-description" class="col-lg-3 control-label">Opis</label>
        <div class="col-lg-9">
            <textarea class="form-control" rows="3" id="edit-description" name="description"></textarea>
            <span class="help-block">Duži opis ostvarene transakcije.</span>
        </div>
    </div>
    <div class="form-group @if($errors->first('category_id')) has-error @endif">
        <label for="edit-category_id" class="col-lg-3 control-label">Kategorija</label>
        <div class="col-lg-9">
            {!! Form::select('category_id', $groupedCategories, null, ['class' => "form-control",  'id '=> "edit-category_id"]) !!}
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-9 col-lg-offset-3">
            <button type="submit" class="btn btn-primary" id="edit-submit">Submit</button>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}