<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

/** Backend routes */
Route::prefix('admin')->group(function() {
    Route::get('articles', 'Admin\ArticlesController@index');
    Route::get('articles/create', 'Admin\ArticlesController@create');
    Route::get('articles/{article}', 'Admin\ArticlesController@edit');
    Route::delete('articles/{article}', 'Admin\ArticlesController@destroy');
});

/** User routes */
Route::get('/articles/{slug}', 'ArticlesController@show');
