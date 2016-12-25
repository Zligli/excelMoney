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
    protected $transaction;
    protected $mainCategory;
    protected $initialCategories;

    public function __construct(ImportMoney $importMoney, Category $category, MainCategory $mainCategory, Transaction $transaction)
    {
        $this->initialCategories = collect(config('initialcategories'));
        $this->sheet = $importMoney->all();
        $this->category = $category;
        $this->mainCategory = $mainCategory;
        $this->transaction = $transaction;
    }

    public function importAll()
    {
        $this->importMainCategories();
        $this->importCategories();
        $this->importTransactions();
        echo "importing done!*!*!*!*!*";


    }


    public function importMainCategories()
    {
        if ($this->mainCategory->first()) {
            dd("Vec su upisane osnovne kategorije");
        }
        $this->initialCategories->transform(function ($item, $key) {
            $mainCategory = $this->mainCategory->create(['name' => $item['main_name']]);
            $item['main_id'] = $mainCategory->id;
            return $item;

        });

    }

    public function importCategories()
    {
        if ($this->category->first()) {
            dd("Vec su upisane kategorije");
        }
        $this->initialCategories->transform(function ($item, $key) {
            foreach ($item['categories'] as $category) {
                $this->category->create(['name' => $category, 'main_category_id' => $item['main_id'], 'type' => $item['type']]);
            }
            return $item;

        });

    }

    public function importTransactions()
    {

        if ($this->transaction->first()) {
            dd("Vec su upisane transakcije");
        }
        $transactions = [];

        foreach ($this->sheet as $row) {
            try {

                $category = $this->category->getByName($row['tip']);
                $transaction['category_id'] = $category->id;
                $transaction['description'] = $row['opis'];
                $transaction['price'] = !is_null($row['duguje']) ? $row['duguje'] : $row['potrazuje'];
                $transaction['created_at'] = $row['datum'];
                $transaction['updated_at'] = new \DateTime();

                $transactions[] = $transaction;
            } catch (\Exception $exception) {
                dd($exception->getMessage(), $row);
            }
        }

        $this->transaction->insert($transactions);
    }
}