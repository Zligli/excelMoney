<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use App\Models\Transaction;

class HomeController extends CRUDController
{
    protected $model;
    protected $model_name;
    protected $mainCategory;

    public function __construct(Transaction $transaction, MainCategory $mainCategory)
    {
        $this->model = $transaction;
        $this->model_name = "Transaction";
        $this->mainCategory = $mainCategory;
        parent::__construct();
    }

    public function index()
    {
        $transactions = $this->model->orderBy('date', 'desc')->paginate(10);
        $mainCategories = $this->mainCategory->all();

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        return view('home', ['transactions' => $transactions, 'groupedCategories' => $groupedCategories]);
    }
}
