<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/','IndexController@index')->name('index.index');

Route::post('/orders','OrdersController@store')->name('orders.store');

Route::get('/notification/success', 'NotificationController@success')->name('notification.success');
Route::get('/notification/error', 'NotificationController@error')->name('notification.error');

Auth::routes();

Route::get('/users','UserController@index')->name('users.index');
Route::get('/users/create','UserController@create')->name('users.create');
Route::post('/users','UserController@store')->name('users.store');
Route::get('/users/{user}','UserController@show')->name('users.show');
Route::get('/users/{user}/edit','UserController@edit')->name('users.edit');
Route::patch('/users/{user}','UserController@update')->name('users.update');
Route::delete('/users{user}','UserController@destroy')->name('users.destroy');

Route::get('/products','ProductController@index')->name('products.index');
Route::get('/products/create','ProductController@create')->name('products.create');
Route::post('/products','ProductController@store')->name('products.store');
Route::get('/details/{product?}','ProductController@show')->name('products.show');
Route::get('/products/{product}/edit','ProductController@edit')->name('products.edit');
Route::patch('/products/{product}','ProductController@update')->name('products.update');
Route::delete('/products{product}','ProductController@destroy')->name('products.destroy');

