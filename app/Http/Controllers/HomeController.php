<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Account;
use App\Models\Balance;
use App\Models\Transaction;
use App\Models\MainCategory;
use Illuminate\Support\Facades\Input;

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
        $params = Input::all();
        $categoryFilter = array_get($params, 'category_filter');
        $fromDateFilter = Carbon::parse(array_get($params, 'from_date'))->format('Y-m-d');
        $toDateFilter = Carbon::parse(array_get($params, 'to_date'))->format('Y-m-d');
        $search = array_get($params, 'search_filter');

        $query = $this->model->query();

        if ($categoryFilter) {
            $query->whereIn('category_id', $categoryFilter);
        }
        if(isset($fromDateFilter) && isset($toDateFilter)) {
            $query->whereBetween('date', [$fromDateFilter, $toDateFilter]);
        }
        if ($search) {
            $query->where('description', 'like', "%$search%");
        }

        $transactions = $query->orderBy('date', 'desc')->paginate(10);

        $mainCategories = $this->mainCategory->all();

        $accounts = $this->account->all();
        $currentDate = Carbon::now()->format(config('custom.show_date'));

        $groupedCategories = [];
        foreach ($mainCategories as $mainCategory) {
            $groupedCategories[$mainCategory->name] = $mainCategory->getForGroup()->toArray();
        }

        $balance = $this->balance->orderBy('date', 'desc')->first();
        $balanceAmountSum = array_get($balance, 'amount_sum', 0);
        $bookBalance = $this->bookBalance();
        $balanceDiff = abs($balanceAmountSum - $bookBalance);
        $balanceWarning = $this->checkBalance($balanceDiff);

        return view('home', [

            'filters' => $params,
            'balance' => $balance,
            'accounts' => $accounts,
            'bookBalance' => $bookBalance,
            'balanceDiff' => $balanceDiff,
            'currentDate' => $currentDate,
            'transactions' => $transactions,
            'balanceWarning' => $balanceWarning,
            'balanceAmountSum' => $balanceAmountSum,
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

    public function checkBalance($balanceDiff)
    {
        return $balanceDiff > config('custom.balance_diff');
    }
}
