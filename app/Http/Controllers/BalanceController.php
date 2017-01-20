<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Account;
use App\Models\Balance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BalanceController extends CRUDController
{

    protected $model;
    protected $model_name;
    protected $account;

    public function __construct(Balance $balance, Account $account)
    {
        $this->model = $balance;
        $this->model_name = "Balance";
        $this->account = $account;
        parent::__construct();
    }

    public function index()
    {
        $balances = $this->model->orderBy('date', 'desc')->paginate(10);
        $balance = $balances->first();
        $accounts = $this->account->all();
        $currentDate = Carbon::now()->format(config('custom.show_date'));

        return view('balance.index',
            ['balance' => $balance, 'balances' => $balances, 'accounts' => $accounts, 'currentDate' => $currentDate]);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules);
        $data = $request->all();

        if (isset($data['date'])) {
            $data['date'] = Helper::dateToDB($data['date']);
        }
        $accounts = [];
        if (isset($data['accounts'])) {
            $accounts = $data['accounts'];;
            $data['amount_sum'] = array_sum(array_column($accounts, 'amount'));
        }

        $dateStartOfDay = $data['date']->startOfDay()->toDateTimeString();
        $dateEndOfDay = $data['date']->endOfDay()->toDateTimeString();

        $balance = $this->model->whereBetween('date', [$dateStartOfDay, $dateEndOfDay])->first();

        if ($balance) {
            $balance->update($data);
        } else {
            $balance = $this->model->create($data);
        }

        $balance->accounts()->sync($accounts);

        return redirect()->back()->with('success', "{$this->model_name} successfully changed!");
    }
}