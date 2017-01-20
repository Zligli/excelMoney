<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'type'];

    protected $dates = ['deleted_at'];

    public $rules = [
        'name' => 'required|unique:accounts',
        'type' => 'required|in:cash,bank'
    ];

    public function getUpdateRulesAttribute()
    {
        $update_rules = [
            'name' => 'required'
        ];

        return array_merge($this->rules, $update_rules);
    }
}