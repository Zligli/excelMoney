<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['created_at', 'price', 'description'];


    protected $appends = ['date'];

    protected $rules = [
        'price' => 'required',
        'description' => 'required'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getDateAttribute()
    {
        $date = Carbon::parse($this->created_at);

        return $date->toDateString();
    }

}