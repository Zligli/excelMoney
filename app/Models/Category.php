<?php
/**
 * Created by PhpStorm.
 * User: glisovic
 * Date: 12/24/16
 * Time: 6:14 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'type', 'main_category_id'];

    protected $rules = [
        'name' => 'required|unique:categories',
        'type' => 'required|in:cost,income'
    ];

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