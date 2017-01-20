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
        $main_categories = $this->mainCategory->pluck('name', 'id');

        return view('categories.index', ['categories' => $categories, 'main_categories' => $main_categories]);
    }
}