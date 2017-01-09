<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = "balance";

    protected $fillable = ['amount_sum', 'date'];

    protected $appends = ['formated_date'];

    public $rules = [
        'date' => 'required'
    ];


    public function getUpdateRulesAttribute()
    {
        $update_rules = [];

        return array_merge($this->rules, $update_rules);
    }

    public function getFormatedDateAttribute()
    {
        $date = Carbon::parse($this->date);

        return $date->format(config('custom.show_date'));
    }

    public function accounts()
    {
        return $this->belongsToMany('App\Models\Account', 'accounts_balance')->withPivot('amount')->withTimestamps();
    }

    public function getAmountByAccountId($id)
    {
        $account = $this->accounts->find($id);

        return $account ? $account->pivot->amount : 0;
    }
}