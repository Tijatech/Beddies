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

Route::get('/', 'PagesController@index');
Route::get('/product/{product}', 'PagesController@single_product');
Route::get('/users/{id}', 'UsersController@update');
Route::delete('/user/{user}', 'UsersController@destroy');

Route::resource('/cart', 'CartsController');
Route::resource('/checkout', 'CheckoutsController');
Auth::routes();

Route::resource('/dashboard', 'DashboardController');
