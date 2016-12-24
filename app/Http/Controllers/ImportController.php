<?php

namespace App\Http\Controllers;


use App\ImportMoney;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Transaction;

class ImportController extends Controller
{


    public function get(ImportMoney $importMoney)
    {
        $sheet = $importMoney->all();

        $grouped = $sheet->groupBy('tip');

        $category_names = array_keys($grouped->toArray());

        $categories = [];

        foreach ($category_names as $category_name) {
            $category_name = strtolower($category_name);
            $category['name'] = ucfirst($category_name);
            $category['main_category_id'] = 1;
            $category['type'] = str_contains($category_name, ["plata", "prihod"]) === false ? "cost" : "income";
            $categories[] = $category;
        }
//        $mainCategory = new MainCategory();
        MainCategory::create(['name'=>'Mains', 'name'=>'Nots', 'name' => 'SXX']);
//        MainCategory::insert(['name'=>'Main']);

//        Category::insert($categories);
    }

}