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
    protected $initialCategories;

    public function __construct(ImportMoney $importMoney, Category $category)
    {
        $this->initialCategories = collect(config('initialcategories'));
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
        $this->initialCategories->transform(function ($item, $key) {
            $mainCategory = MainCategory::create(['name' => $item['main_name']]);
            $item['main_id'] = $mainCategory->id;
            return $item;

        });

    }

    public function importCategories()
    {
        $this->initialCategories->transform(function ($item, $key) {
            foreach ($item['categories'] as $category) {
                Category::create(['name' => $category, 'main_category_id' => $item['main_id'], 'type' => $item['type']]);
            }
            return $item;

        });

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