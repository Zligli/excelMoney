<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\MainCategory;

class HomeController extends CRUDController
{
    protected $model;
    protected $account;
    protected $balance;
    protected $model_name;
    protected $mainCategory;

    public function __construct(
        Account $account,
        Balance $balance,
        Transaction $transaction,
        MainCategory $mainCategory
    ) {
        $this->account = $account;
        $this->balance = $balance;
        $this->model = $transaction;
        $this->model_name = "Transaction";
        $this->mainCategory = $mainCategory;
        parent::__construct();
    }

    public function index()
    {
        $transactions = $this->model->orderBy('date', 'desc')->paginate(10);

        $mainCategories = $this->mainCategory->all();

        $accounts = $this->account->all();
        $currentDate = Carbon::now()->format(config('custom.show_date'));

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        $balance = $this->balance->orderBy('date', 'desc')->first();
        $bookBalance = $this->bookBalance();
        $balanceWarning = $this->checkBalance($bookBalance, $balance);

        return view('home', [
            'balance' => $balance,
            'accounts' => $accounts,
            'bookBalance' => $bookBalance,
            'currentDate' => $currentDate,
            'transactions' => $transactions,
            'balanceWarning' => $balanceWarning,
            'groupedCategories' => $groupedCategories
        ]);
    }

    public function bookBalance()
    {
        $income = $this->model->with('category')->whereHas('category', function ($query) {
            $query->where('type', 'income');
        })->sum('price');

        $costs = $this->model->with('category')->whereHas('category', function ($query) {
            $query->where('type', 'cost');
        })->sum('price');

        return $income - $costs;
    }

    public function checkBalance($bookBalance, $balance)
    {
        $difference = abs($bookBalance - $balance->amount_sum);

        return $difference > config('custom.balance_diff');
    }
}
