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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('home/manageAddress', 'HomeController@manageAddress');
Route::post('home/saveAddress', 'HomeController@saveAddress');
Route::get('home/viewAddress', 'HomeController@viewAddress')->name('address');
Route::get('home/updateAddress/{id}', 'HomeController@updateAddress');