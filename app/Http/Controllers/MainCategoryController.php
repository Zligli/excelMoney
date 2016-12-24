<?php

namespace App\Http\Controllers;


use App\Models\MainCategory;

class MainCategoryController extends CRUDController
{

    public function __construct(MainCategory $mainCategory)
    {
        parent::__construct($mainCategory);
    }

}