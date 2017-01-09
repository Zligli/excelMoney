<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\MainCategory;

class CategoryController extends CRUDController
{
    protected $model;
    protected $mainCategory;
    protected $model_name;

    public function __construct(Category $category, MainCategory $mainCategory)
    {
        $this->model = $category;
        $this->mainCategory = $mainCategory;
        $this->model_name = "Category";
        parent::__construct();
    }

    public function index()
    {
        $categories = $this->model->paginate(10);

        return view('categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $main_categories = $this->mainCategory->pluck('name', 'id');

        return view('categories.create', ['main_categories' => $main_categories]);
    }

    public function edit($id)
    {
        $category = $this->model->find($id);
        if (!$category) {
            //TODO
            return redirect()->back();
        }
        $main_categories = $this->mainCategory->pluck('name', 'id');

        return view('categories.edit', ['category' => $category, 'main_categories' => $main_categories]);
    }
}