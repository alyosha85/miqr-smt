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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin_dashboard',function(){
    return view('admin/admin_dashboard');
});
//Route::post('/store', 'InvAbItemController@store')->name('store');

Route::get('/sync','TempInvAbItemController@index')->name('sync');

Route::get('/search','InvAbItemController@search')->name('search');

Route::get('/items/create','InvAbItemController@create')->name('items.create');

Route::get('/auto','InvLastNumberController@index')->name('auto');

// pdf upload test

