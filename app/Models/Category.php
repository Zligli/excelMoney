<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'type', 'main_category_id'];

    protected $dates = ['deleted_at'];

    public $rules = [
        'name' => 'required|unique:categories',
        'type' => 'required|in:cost,income'
    ];

    public function getUpdateRulesAttribute()
    {
        $update_rules = [
            'name' => "required"
        ];

        return array_merge($this->rules, $update_rules);
    }

    public function mainCategory()
    {
        return $this->belongsTo('App\Models\MainCategory');
    }

    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function getByName($name)
    {
        return $this->where(['name' => $name])->first();
    }
}