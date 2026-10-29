<?php

use Illuminate\Support\Facades\Route;

// Catch any URL path and serve the Vue single-page app container
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '.*');
