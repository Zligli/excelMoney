<?php

namespace App\Http\Controllers;


use App\ImportMoney;

class ImportController  extends Controller
{


    public function get(ImportMoney $importMoney)
    {
        $sheet = $importMoney->all();

        $grouped = $sheet->groupBy('tip');
        dd($grouped->toArray());
    }

}