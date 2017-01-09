@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <legend>Glavne Kategorije</legend>
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Kategorije</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mainCategories as $mainCategory)
                    <tr>
                        <td>{{ $mainCategory->name }}</td>
                        <td>{{ $mainCategory->nameList() }}</td>
                        <td><a class='btn btn-warning btn-block'
                               href='{{ action("MainCategoryController@edit", ["id" => $mainCategory->id]) }}'>
                                <i class='fa fa-pencil'></i></a></td>
                        <td>
                            {!! Form::open([ 'method'  => 'delete', 'action' => ['MainCategoryController@destroy', $mainCategory->id], 'id' => 'delete_'.$mainCategory->id]) !!}
                            <button type="button" class="btn btn-danger btn-block delete" data-toggle="modal"
                                    data-target="#modal-delete" data-id="{{ $mainCategory->id }}"><i
                                        class="fa fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $mainCategories->links() }}
        </div>
    </div>

    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection


