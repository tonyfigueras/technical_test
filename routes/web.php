<?php

use Illuminate\Support\Facades\Route;

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
Route::get('{path}','App\Http\Controllers\HomeController@index')->where( 'path' , '([A-z\d\-\/_.]+)?' );


Route::group(['middleware' => ['role:admin']], function () {
    //rutas accesibles solo para admin
    Route::post('get_country', 'App\Http\Controllers\CountryStateCityController@country');
    Route::post('get_state/{country_id}', 'App\Http\Controllers\CountryStateCityController@state');
    Route::post('get_city/{state_id}', 'App\Http\Controllers\CountryStateCityController@city');
    Route::post('add', 'App\Http\Controllers\UserController@add');
    Route::post('edit/{id}', 'App\Http\Controllers\UserController@edit');
    Route::delete('delete/{id}', 'App\Http\Controllers\UserController@delete');
    Route::post('alluser', 'App\Http\Controllers\UserController@index');
});


