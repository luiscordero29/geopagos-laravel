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

# home 
Route::get('/', 'HomeController@index');
# end home

# user
Route::match(['get', 'post'], '/users/index', 'UserController@index');
Route::get('/users/create', 'UserController@create');
Route::post('/users/store', 'UserController@store');
Route::get('/users/show/{id}', 'UserController@show');
Route::get('/users/edit/{id}', 'UserController@edit');
Route::put('/users/update/{id}', 'UserController@update');
Route::delete('/users/delete/{id}', 'UserController@destroy');
# end user

# favorite
Route::match(['get', 'post'], '/favorites/index', 'FavoriteController@index');
Route::get('/favorites/create', 'FavoriteController@create');
Route::post('/favorites/store', 'FavoriteController@store');
Route::get('/favorites/show/{id}', 'FavoriteController@show');
Route::get('/favorites/edit/{id}', 'FavoriteController@edit');
Route::put('/favorites/update/{id}', 'FavoriteController@update');
Route::delete('/favorites/delete/{id}', 'FavoriteController@destroy');
# end favorite

# payments
Route::match(['get', 'post'], '/payments/index', 'PaymentsController@index');
Route::get('/payments/create', 'PaymentsController@create');
Route::post('/payments/store', 'PaymentsController@store');
Route::get('/payments/show/{id}', 'PaymentsController@show');
Route::get('/payments/edit/{id}', 'PaymentsController@edit');
Route::put('/payments/update/{id}', 'PaymentsController@update');
Route::delete('/payments/delete/{id}', 'PaymentsController@destroy');
# end payments