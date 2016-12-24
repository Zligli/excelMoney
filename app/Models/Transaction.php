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
    protected $timestamps;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}