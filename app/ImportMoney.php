<?php
/**
 * Created by PhpStorm.
 * User: Glisovici
 * Date: 12/24/2016
 * Time: 2:13 PM
 */

namespace App;


use Maatwebsite\Excel\Files\ExcelFile;

class ImportMoney extends ExcelFile
{

    protected $file = 'Book1.xlsx';


    public function getFile()
    {
        return $this->file;
    }

    public function getFilters()
    {
        return [
            'chunk'
        ];
    }
}