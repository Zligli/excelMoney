<?php

namespace App\Models;


use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['date', 'price', 'description', 'category_id'];


    protected $appends = ['formated_date', 'category_name', 'formated_price', 'type'];

    public $rules = [
        'price' => 'required',
        'description' => 'required',
        'category_id' => 'required',
        'date' => 'required|before:tomorrow'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getFormatedDateAttribute()
    {
        $date = Carbon::parse($this->date);

        return $date->format(config('custom.show_date'));
    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function getFormatedPriceAttribute()
    {
        return Helper::price($this->price);
    }

    public function getTypeAttribute()
    {
        return $this->category->type;
    }
}