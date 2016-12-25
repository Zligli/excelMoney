<?php

namespace App\Http\Controllers;


use App\Models\Transaction;

class TransactionController extends CRUDController
{
    protected $model;

    public function __construct(Transaction $transaction)
    {
        $this->model = $transaction;
        parent::__construct($this->model);
    }

    public function index()
    {
        $transactions = $this->model->get();
        return view('transactions.index', ['transactions' => $transactions]);
    }
}