<?php

use Illuminate\Support\Facades\Route;

/*
| Web Routes
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recipes', function () {
    return view('recipes');
});

