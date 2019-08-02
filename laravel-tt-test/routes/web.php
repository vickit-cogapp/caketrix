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

Route::get('/', 'CakeController@index')->name('cakes');
Route::get('/admin', 'CakeTsarController@index');
Route::get('/admin/add', 'CakeTsarController@add');
Route::get('/admin/save', 'CakeTsarController@save');

Route::resource('/cakes', 'CakeController');
Route::post('/vote', 'VoteController@store');