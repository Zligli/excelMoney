<?php

namespace App\Http\Controllers;


use App\ImportMoney;
use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Transaction;

class ImportController extends Controller
{
    protected $sheet;
    protected $category;

    public function __construct(ImportMoney $importMoney, Category $category)
    {
        $this->sheet = $importMoney->all();
        $this->category = $category;
    }

    public function importAll()
    {
        $this->importMainCategories();
        $this->importCategories();
        $this->importTransactions();
    }


    public function importMainCategories()
    {
        MainCategory::create(['name' => 'Mains']);
    }

    public function importCategories()
    {

        $grouped = $this->sheet->groupBy('tip');
        $category_names = array_keys($grouped->toArray());

        $categories = [];

        foreach ($category_names as $category_name) {
            $category_name = strtolower($category_name);
            $category['name'] = ucfirst($category_name);
            $category['main_category_id'] = 1;
            $category['type'] = str_contains($category_name, ["plata", "prihod"]) === false ? "cost" : "income";
            $category['created_at'] = new \DateTime();
            $category['updated_at'] = new \DateTime();
            $categories[] = $category;
        }

        Category::insert($categories);
    }

    public function importTransactions()
    {
        $transactions = [];

        foreach ($this->sheet as $row) {
            $category = $this->category->getByName($row['tip']);
            $transaction['category_id'] = $category->id;
            $transaction['description'] = $row['opis'];
            $transaction['price'] = !is_null($row['duguje']) ? $row['duguje'] : $row['potrazuje'];
            $transaction['created_at'] = $row['datum'];
            $transaction['updated_at'] = new \DateTime();

            $transactions[] = $transaction;
        }

        Transaction::insert($transactions);
    }
}