<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['name', 'type'];

    public $rules = [
        'name' => 'required',
        'type' => 'required|in:cash,bank'
    ];


    public function getUpdateRulesAttribute()
    {
        $update_rules = [];

        return array_merge($this->rules, $update_rules);
    }
}