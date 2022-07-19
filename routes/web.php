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
Route::get('/home', 'HomeController@index')->name('home.index');

Route::get('/catalog','CatalogController@index')->name('catalog.index');

Route::get('/details', 'DetailsController@index')->name('details.index');
Route::get('/details/{product}','DetailsController@show')->name('details.show');

Route::post('/orders','OrdersController@store')->name('orders.store');

Route::get('/notification/success', 'NotificationController@success')->name('notification.success');
Route::get('/notification/error', 'NotificationController@error')->name('notification.error');

Auth::routes();

