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

Route::resource('admin/articles', 'Admin\ArticlesController');
Route::resource('admin/categories', 'Admin\CategoriesController');
Route::resource('admin', 'Admin\AdminController');
/** User routes */
Route::get('/', 'ArticlesController@index');
Route::get('/articles/{article}', 'ArticlesController@show');

Route::post('/articles/{article}/comments', 'CommentsController@store');
Route::patch('/articles/{article}/comments/{comment}', 'CommentsController@update');
Route::delete('/articles/{article}/comments/{comment}', 'CommentsController@destroy');

Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/{category}', 'CategoriesController@show');

