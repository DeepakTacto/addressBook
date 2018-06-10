<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('address', 'AddressController@index');
// List single article
Route::get('address/{id}', 'AddressController@show');
// Create new article
Route::post('address', 'AddressController@store');
// Update article
Route::put('address', 'AddressController@store');
// Delete article
Route::delete('address/{id}', 'AddressController@destroy');