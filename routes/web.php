<?php

/**
 * Application routes.
 */
Route::get('/', function () {
    return view('welcome');
});

Route::get('page', function () {
    return view('pages.default');
});