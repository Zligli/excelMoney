@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <legend>Kategorije</legend>
                <table class="table table-striped table-hover " id="dataTable">
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
                            <td><a class='btn btn-danger btn-block'
                                   href='{{ action("CategoryController@destroy", ["id" => $category->id]) }}'><i
                                            class='fa fa-trash'></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection


