<?php

Route::get('/', function (){
    echo "home";
});

Route::get('/import', "ImportController@get");