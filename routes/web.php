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

Route::get('singular', ['projects', function ($project) {
    return view('pages.projects.singular', [
        'project' => $project
    ]);
}]);