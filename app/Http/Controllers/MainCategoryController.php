<?php

namespace App\Http\Controllers;


use App\Models\MainCategory;

class MainCategoryController extends CRUDController
{

    protected $model;
    protected $model_name;

    public function __construct(MainCategory $mainCategory)
    {
        $this->model = $mainCategory;
        $this->model_name = "Main Category";
        parent::__construct();
    }

    public function index()
    {
        $mainCategories = $this->model->paginate(10);

        return view('main_categories.index', ['mainCategories' => $mainCategories]);
    }

    public function create()
    {

        return view('main_categories.create');
    }

    public function edit($id)
    {
        $main_category = $this->model->find($id);
        if (!$main_category) {
            return redirect()->back()->with('danger', "There was an error updating!");
        }

        return view('main_categories.edit', ['main_category' => $main_category]);
    }

}