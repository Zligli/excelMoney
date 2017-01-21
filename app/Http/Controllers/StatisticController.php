<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Transaction;
use Carbon\Carbon;

class StatisticController extends Controller
{
    protected $transaction;
    protected $category;
    protected $date_from;
    protected $date_to;

    public function __construct(Transaction $transaction, Category $category)
    {
        $this->transaction = $transaction;
        $this->category = $category;

        $carbon = new Carbon('8 months ago');
        $this->date_from = $carbon->startOfDay()->toDateTimeString();
        $this->date_to = Carbon::now()->startOfDay()->toDateTimeString();

    }

    public function index()
    {
        $costs = $this->transaction->costs()->whereBetween('date', [$this->date_from, $this->date_to])->get();
        $costs = $this->prepareData($costs, 'costs');

        $incomes = $this->transaction->incomes()->whereBetween('date', [$this->date_from, $this->date_to])->get();
        $incomes = $this->prepareData($incomes, 'incomes');

        $savings = $this->getSavings();
        $savings = $this->prepareData($savings, 'costs');

        return view('statistics.index', ['incomes' => $incomes, 'costs' => $costs, 'savings' => $savings]);
    }

    private function prepareData($transactions, $type)
    {
        $categories = $this->category->$type()->pluck('id')->toArray();

        $group_month = $transactions->groupBy(function ($item) {
            return $item->date->format('M');
        });

        $months = [];
        $sums = array_fill_keys($categories, []);

        foreach ($group_month as $month => $transaction) {
            $months[] = $month;

            $group_category = $transaction->groupBy('category_id');
            $group_category_ids = array_keys($group_category->toArray());

            foreach ($sums as $id => $sum) {
                if (!in_array($id, $group_category_ids)) {
                    $sums[$id][] = 0;
                } else {
                    $sums[$id][] = $group_category[$id]->sum('price');
                }
            }
        }

        $data = ['periods' => $months, 'sums' => $sums];
        return $data;
    }

    private function getSavings()
    {
        return $this->transaction->whereBetween('date', [$this->date_from, $this->date_to])->whereHas('category',
            function ($query) {
                $query->where('name', 'like', '%tednja%');
            })->get();
    }
}