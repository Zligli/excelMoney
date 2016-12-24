<?php

namespace App\Http\Controllers;


use App\Models\Transaction;

class TransactionController extends CRUDController
{

    public function __construct(Transaction $transaction)
    {
        parent::__construct($transaction);
    }

}