<?php

namespace App\Models;


use App\Helpers\Helper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = ['date', 'price', 'description', 'category_id'];

    protected $appends = ['formated_date', 'category_name', 'formated_price', 'type'];

    protected $dates = ['deleted_at', 'date'];

    public $rules = [
        'price' => 'required',
        'description' => 'string',
        'category_id' => 'required|numeric',
        'date' => 'required|before:tomorrow'
    ];

    public function getUpdateRulesAttribute()
    {
        $update_rules = [];

        return array_merge($this->rules, $update_rules);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withTrashed();
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

    public function scopeIncomes($query)
    {
        return $query->whereHas('category', function ($q) {
            $q->where('type', '=', 'income');
        });
    }

    public function scopeCosts($query)
    {
        return $query->whereHas('category', function ($q) {
            $q->where('type', '=', 'cost');
        });
    }
}