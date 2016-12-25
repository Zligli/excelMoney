<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Transaction;

class TransactionController extends CRUDController
{
    protected $model;
    protected $category;

    public function __construct(Transaction $transaction, Category $category)
    {
        $this->model = $transaction;
        $this->category = $category;
        parent::__construct($this->model);
    }

    public function index()
    {
        $transactions = $this->model->get();
        $categories = $this->category->all();
        return view('transactions.index', ['transactions' => $transactions, 'categories' => $categories]);
    }

}