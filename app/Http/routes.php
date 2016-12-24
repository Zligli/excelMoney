<?php

Route::get('/', function () {

//    $excel = \Excel::load('Book1.xlsx', function ($render) {
//        $render->dd();
//    })->get();

    class MoneyImport extends \Maatwebsite\Excel\Files\ExcelFile {
        public function getFile()
        {
            return 'Book1.xlsx';
        }

        public function getFilters()
        {
            return [
                'chunk'
            ];
        }
    }
});

Route::get('/import', "ImportController@get");