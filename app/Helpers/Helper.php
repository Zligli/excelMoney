<?php


namespace App\Helpers;


use Carbon\Carbon;

class Helper
{
    public static function firstToUp($string)
    {
        $fc = mb_strtoupper(mb_substr($string, 0, 1));
        return $fc . mb_substr($string, 1);
    }

    public static function price($price)
    {
        return number_format($price, 2);
    }

    public static function dateToDB($date)
    {
        return Carbon::createFromFormat(config('custom.show_date'), $date);
    }

}