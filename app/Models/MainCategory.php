<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainCategory extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];

    protected $dates = ['deleted_at'];

    public $rules = [
        'name' => 'required|unique:main_categories'
    ];

    public function getUpdateRulesAttribute()
    {
        $update_rules = [
            'name' => "required"
        ];

        return array_merge($this->rules, $update_rules);
    }

    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }

    public function getForGroup()
    {
        return $this->categories()->pluck('name', 'id');
    }

    public function nameList()
    {
        return implode(', ', $this->categories()->pluck('name')->toArray());
    }
}