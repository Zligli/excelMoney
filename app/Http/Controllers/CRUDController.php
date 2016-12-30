<?php

namespace App\Http\Controllers;


use App\Helpers\Helper;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    private $model;
    private $model_name;

    public function __construct($model, $model_name)
    {
        $this->middleware('auth');
        $this->model = $model;
        $this->model_name = $model_name;
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
        $this->validate($request, $this->model->rules);
        $data = $request->all();

        if (isset($data['date'])) {
            $data['date'] = Helper::dateToDB($data['date']);
        }

        $this->model->create($data);

        return redirect()->back()->with('success', "{$this->model_name} successfully added!");
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->model->rules);
        $data = $request->all();

        if (isset($data['date'])) {
            $data['date'] = Helper::dateToDB($data['date']);
        }

        $this->model->find($id)->update($data);

        return redirect()->back()->with('success', "{$this->model_name} successfully updated!");

    }

    public function destroy($id)
    {
        $model = $this->model->find($id)->delete();
        if(!$model) {
            //TODO
            return redirect()->back();
        }
        return redirect()->back()->with('success', "{$this->model_name} successfully deleted!");
    }
}