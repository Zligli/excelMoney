@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <legend>Kategorije</legend>
            <table class="table table-striped table-hover ">
                <thead>
                <tr>
                    <th>Ime</th>
                    <th>Glavna kategorija</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->mainCategory->name }}</td>
                        <td><a class='btn btn-warning btn-block'
                               href='{{ action("CategoryController@edit", ["id" => $category->id]) }}'><i
                                        class='fa fa-pencil'></i></a></td>
                        <td>
                            {!! Form::open([ 'method'  => 'delete', 'action' => ['CategoryController@destroy', $category->id], 'id' => 'delete_'.$category->id]) !!}
                            <button type="button" class="btn btn-danger btn-block delete" data-toggle="modal"
                                    data-target="#modal-delete" data-id="{{ $category->id }}"><i
                                        class="fa fa-trash"></i>
                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>

    @include('partials.modaldelete')

@endsection

@section('script')
    @parent
    @include('scripts.deleteconfirm')

@endsection


