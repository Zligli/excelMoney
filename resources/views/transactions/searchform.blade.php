{!! Form::open(['method' => 'GET', 'action' => 'HomeController@index', 'id' => 'filter']) !!}
<div class="col-lg-3">
    <select class="form-control" id="search_select" multiple="multiple" name="category_filter[]">
        @foreach($groupedCategories as $mainCategory => $categories)
            <optgroup label="{{ $mainCategory }}">
                @foreach($categories as $categoryId => $category)
                    <option value="{{ $categoryId }}"
                        @if(in_array($categoryId, array_get($filters, 'category_filter', [])))
                            selected="selected"
                        @endif>
                        {{ $category }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
</div>
<div class="col-lg-4">
    <div class="date-range input-daterange  input-group" data-date-end-date="0d">
        {!! Form::text('from_date', Input::get('from_date'), ["class" => "input-sm form-control", "placeholder" => "From date"]) !!}
        <span class="input-group-addon">to</span>
        {!! Form::text('to_date', Input::get('to_date'), ["class" => "input-sm form-control", "placeholder" => "To date"]) !!}
    </div>
</div>
<div class="col-lg-3">
    {!! Form::text('search_filter',Input::get('search_filter'), ["class" => "input-sm form-control", "placeholder" => "Search"]) !!}
</div>
<div class="col-lg-2">
    <button type="button" class="btn btn-warning btn-sm" form="filter" id="search_clear">Clear</button>
    <button type="submit" class="btn btn-primary btn-sm" form="filter">Filter</button>
</div>
{!! Form::close() !!}