<?php

/**
 * Application routes.
 */
Route::get('/', function () {
    return view('pages.default');
});

Route::get('page', function () {
    return view('pages.default');
});

Route::get('archive', ['projects', function () {
    return view('pages.projects.archive');
}]);