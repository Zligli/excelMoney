<?php

Route::get('/', function (){
    echo "home";
});

/**-------------------*/
/*  Initial IMPORT
/**-------------------*/
Route::get('import', "ImportController@importAll");

/**-------------------*/
/*  Transactions
/**-------------------*/
Route::resource('transactions', "TransactionController");

/**-------------------*/
/*  Categories
/**-------------------*/
Route::resource('categories', "CategoryController");

/**-------------------*/
/*  Main Categories
/**-------------------*/
Route::resource('maincategories', "MainCategoryController");
