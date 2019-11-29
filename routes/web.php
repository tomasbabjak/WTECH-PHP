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
Route::get('/', 'TestController@index')->name('test');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cart', 'CartController@index')->name('fart.index');
Route::post('/fart/{id}', 'CartItemController@update')->name('fart.update');
Route::post('/cart/{id}', 'CartItemController@delete')->name('cart.delete');

Route::get('/transport', 'OrderController@index')->name('transport.index');
Route::get('/customer', 'OrderController@show')->name('transport.show');

Route::get('/order', 'CustomerController@index')->name('customer.index');
Route::get('/summary', 'CustomerController@show')->name('customer.show');

Route::resource('tasks', 'TaskController', ['middleware' => 'auth']);

Route::get('/test', 'TestController@index')->name('test');

Route::get('/product/{product}', 'ObuvController@show')->name('obuv.show');

Route::post('/cart', 'CartItemController@store')->name('cart.store');

Route::get('/{category}', 'TestController@show')->name('test.show');

Route::get('products/list/{page}', 'ObuvController@list');
Route::delete('products/{product}', 'ObuvController@destroy');
Route::post('products/', 'ObuvController@store');
Route::get('products/{product}/edit', 'ObuvController@edit');
Route::put('products/{product}', 'ObuvController@update');

Route::get('products/create', 'ObuvController@categories');