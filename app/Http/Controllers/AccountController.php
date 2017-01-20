<?php

namespace App\Http\Controllers;


use App\Models\Account;

class AccountController extends CRUDController
{

    protected $model;
    protected $model_name;

    public function __construct(Account $account)
    {
        $this->model = $account;
        $this->model_name = "Account";
        parent::__construct();
    }

    public function index()
    {
        $accounts = $this->model->paginate(10);

        return view('accounts.index', ['accounts' => $accounts]);
    }
}