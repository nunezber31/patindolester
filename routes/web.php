<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// --------------------
// Backpack\Demo routes
// --------------------
Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['admin'],
    'namespace'  => 'Admin',
], function () {
    // CRUD resources and other admin routes
    CRUD::resource('monster', 'MonsterCrudController');
});

Route::get('api/article', 'Api\ArticleController@index');
Route::get('api/article/{id}', 'Api\ArticleController@show');


// --------------------
// Pages routes
// --------------------
Route::get('/web-dev', function() {
	return view('web-dev');
});
Route::get('/about-us', 'MonsterCrudController@about-us');