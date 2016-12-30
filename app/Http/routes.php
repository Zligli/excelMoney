<?php

Route::auth();

Route::get('/', 'HomeController@index');

/**-------------------*/
/*  Initial IMPORT
/**-------------------*/
Route::get('import', "ImportController@index");
Route::post('import', "ImportController@importAll");

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

/**-------------------*/
/*  Accounts
/**-------------------*/
Route::resource('accounts', "AccountController");

/**-------------------*/
/*  Balance
/**-------------------*/
Route::resource('balance', "BalanceController");
