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


Route::get('/', 'AdsController@index')->name('home');
Route::get('/edit', 'AdsController@edit');
Route::post('/edit', 'AdsController@store');
Route::get('/edit/{id}', 'AdsController@editAd');
Route::put('/edit/{id}', 'AdsController@update');
Route::delete('/delete/{id}', 'AdsController@destroy');
Route::post('/signin', 'RegistrationController@store');
Route::get('/logout', 'RegistrationController@destroy');
Route::get('/{id}', 'AdsController@showAd');