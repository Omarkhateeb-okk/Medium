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
//
Route::get('/', function() {
    return view('articles.index');
});
Route::get('articles/dash','ArticleController@dash')->name('dash');
Route::resource('articles', 'ArticleController');


Auth::routes();

