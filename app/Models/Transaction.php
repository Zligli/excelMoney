<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['date', 'price', 'description'];


    protected $rules = [
        'date' => 'required',
        'price' => 'required',
        'description' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}