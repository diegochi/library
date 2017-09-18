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

Route::get('/', function() { return view('welcome'); });
Route::resource('books', 'BooksController');
Route::resource('categories', 'CategoriesController');
Route::post('/books/search', 'BooksController@search');
Route::post('/books/changestatus', 'BooksController@changestatus');
