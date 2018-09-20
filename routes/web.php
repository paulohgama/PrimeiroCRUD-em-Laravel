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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', 'CategoriaController');
Route::resource('users', 'UserController');
Route::get('categorias/{categoria}/delete', 'CategoriaController@delete')->name('categorias.delete');
Route::get('users/{user}/delete', 'UserController@delete')->name('users.delete');
//Route::get('/categorias/{categoria}/edit', 'CategoriaController@edit');