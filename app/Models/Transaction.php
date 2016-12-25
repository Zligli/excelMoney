<?php

namespace App\Models;


use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['created_at', 'price', 'description'];


    protected $appends = ['date', 'category_name', 'saldo', 'formated_price'];

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

    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }

    public function getSaldoAttribute()
    {
        $costs = $this->where('id', '<=', $this->id)->costs()->sum('price');
        $incomes = $this->where('id', '<=', $this->id)->incomes()->sum('price');

        return Helper::price($incomes - $costs);
    }

    public function getFormatedPriceAttribute()
    {
        return Helper::price($this->price);
    }

    public function scopeCosts($query)
    {
        return $query->whereHas('category', function ($query) {
            return $query->where('type', '=', 'cost');
        });
    }

    public function scopeIncomes($query)
    {
        return $query->whereHas('category', function ($query) {
            return $query->where('type', '=', 'income');
        });
    }
}