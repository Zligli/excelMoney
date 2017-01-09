@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <legend>Glavne Kategorije</legend>
                <table class="table table-striped table-hover " id="dataTable">
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
                                   href='{{ action("MainCategoryController@edit", ["id" => $mainCategory->id]) }}'><i
                                            class='fa fa-pencil'></i></a></td>
                            <td><a class='btn btn-danger btn-block'
                                   href='{{ action("MainCategoryController@destroy", ["id" => $mainCategory->id]) }}'><i
                                            class='fa fa-trash'></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $mainCategories->links() }}
            </div>
        </div>
    </div>
@endsection
@section('script')
    @parent
@endsection


