<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use App\Models\MainCategory;

class TransactionController extends CRUDController
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
        $transactions = $this->model->get();
        $mainCategories = $this->mainCategory->all();

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        return view('transactions.index', ['transactions' => $transactions, 'groupedCategories' => $groupedCategories]);
    }

    public function edit($id)
    {
        $transaction = $this->model->find($id);
        if (!$transaction) {
            //TODO
            return redirect()->back();
        }

        $mainCategories = $this->mainCategory->all();

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        return view('transactions.edit', ['transaction' => $transaction, 'groupedCategories' => $groupedCategories]);
    }

}