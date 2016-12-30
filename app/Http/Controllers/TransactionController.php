<?php

namespace App\Http\Controllers;


use App\Helpers\Helper;
use App\Models\MainCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;

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
        parent::__construct($this->model, $this->model_name);
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
        if(!$transaction) {
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