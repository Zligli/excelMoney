<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Balance;
use App\Models\MainCategory;
use App\Models\Transaction;
use Carbon\Carbon;

class HomeController extends CRUDController
{
    protected $model;
    protected $account;
    protected $balance;
    protected $model_name;
    protected $mainCategory;

    public function __construct(
        Transaction $transaction,
        MainCategory $mainCategory,
        Account $account,
        Balance $balance
    ) {
        $this->model = $transaction;
        $this->account = $account;
        $this->balance = $balance;
        $this->model_name = "Transaction";
        $this->mainCategory = $mainCategory;
        parent::__construct();
    }

    public function index()
    {
        $transactions = $this->model->orderBy('date', 'desc')->paginate(10);
        $mainCategories = $this->mainCategory->all();

        $balance = $this->balance->orderBy('date', 'desc')->first();
        $accounts = $this->account->all();
        $currentDate = Carbon::now()->format(config('custom.show_date'));

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        return view('home', [
            'transactions' => $transactions,
            'groupedCategories' => $groupedCategories,
            'balance' => $balance,
            'accounts' => $accounts,
            'currentDate' => $currentDate
        ]);
    }
}
