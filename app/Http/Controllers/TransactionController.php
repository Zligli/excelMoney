<?php

namespace App\Http\Controllers;


use App\Models\MainCategory;
use App\Models\Transaction;

class TransactionController extends CRUDController
{
    protected $model;
    protected $mainCategory;

    public function __construct(Transaction $transaction, MainCategory $mainCategory)
    {
        $this->model = $transaction;
        $this->mainCategory = $mainCategory;
        parent::__construct($this->model);
    }

    public function index()
    {
        $transactions = $this->model->get();
        $mainCategories = $this->mainCategory->all();

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        return view('transactions.index', ['transactions' => $transactions, 'groupedCategories' => $groupedCategories]);
    }

}