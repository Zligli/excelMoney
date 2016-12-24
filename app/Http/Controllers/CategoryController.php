<?php

namespace App\Http\Controllers;


use App\Models\Category;

class CategoryController extends CRUDController
{

    public function __construct(Category $category)
    {
        parent::__construct($category);
    }

}