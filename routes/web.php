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


Route::resource('admin/articles', 'Admin\ArticlesController');
Route::resource('admin/categories', 'Admin\CategoriesController');
Route::resource('admin', 'Admin\AdminController');
/** User routes */
Route::get('/articles/', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');

