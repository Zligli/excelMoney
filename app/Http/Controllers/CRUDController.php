<?php

namespace App\Http\Controllers;


use App\Http\Requests\Request;

class CRUDController extends Controller
{
    private $model;

    public function __construct($model)
    {
        $this->middleware('auth');
        $this->model = $model;
    }

    public function index()
    {
        return $this->model->all();
    }

    public function show($id)
    {
        return $this->model->find($id);
    }

    public function store(Request $request)
    {
        return $this->model->create($request->all());
    }

    public function update(Request $request, $id)
    {
        return $this->model->find($id)->update($request->all());
    }

    public function destroy($id)
    {
        return $this->model->find($id)->delete();
    }
}