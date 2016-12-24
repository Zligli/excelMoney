<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    protected $fillable = ['name'];

    protected $rules = [
        'name' => 'required'
    ];


    public function categories()
    {
        return $this->hasMany('App\Models\Category');
    }
}