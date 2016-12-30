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

    public function create()
    {

        return view('accounts.create');
    }

    public function edit($id)
    {
        $account = $this->model->find($id);
        if (!$account) {
            //TODO
            return redirect()->back();
        }

        return view('accounts.edit', ['account' => $account]);
    }

}