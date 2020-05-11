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

//Routes for Pages
Route::get('/', 'PagesController@index');
Route::get('/product/{product}', 'PagesController@single_product');

//Routes for Users
Route::get('/users/{id}', 'UsersController@update');
Route::delete('/user/{user}', 'UsersController@destroy');

//Routes for Carts
Route::get('/cart', 'CartsController@index');
Route::post('/cart', 'CartsController@store');
Route::delete('/cart/{cart}', 'CartsController@destroy');
-

//Routes for checkout
Route::get('/checkout', 'CheckoutsController@index');
Route::post('/checkout', 'CheckoutsController@store');


Auth::routes();
Route::get('/dashboard', 'DashboardController@index');

//Routes for Products
Route::post('/products/{product}/edit', 'ProductsController@edit');
Route::get('/products/create', 'ProductsController@create');
Route::delete('/products/{product}', 'ProductsController@destroy');
Route::post('/products/{product}', 'ProductsController@update');
Route::post('/products', 'ProductsController@store');



