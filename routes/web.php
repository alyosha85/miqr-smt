<?php

use App\Http\Controllers\InvAbItemController;
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

// one time query from temp to inv_ab_item table
Route::get('/sync','TempInvAbItemController@index')->name('sync');

// item search query
Route::get('/search','InvAbItemController@search')->name('search');

Route::post('search_check','InvAbItemController@searchCheck')->name('search_check');

Route::get('/items/create','InvAbItemController@create')->name('items.create');

Route::get('/auto','InvLastNumberController@index')->name('auto');

//Item Controllers
Route::get('/inventory','InvAbItemController@index')->name('inventory');
Route::get('/item/create','InvAbItemController@create')->name('item.create');
Route::patch('/item/update/{id}','InvAbItemController@update')->name('item.update');
Route::post('/item','InvAbItemController@store')->name('item.store');


// pdf upload test
Route::post('dropzone/upload_pdf', 'InvAbItemController@upload_pdf')->name('dropzone.upload_pdf');
// show pdf
Route::get('dropzone/fetch_pdf', 'InvAbItemController@fetch_pdf')->name('dropzone.fetch_pdf');
// delete pdf
Route::get('dropzone/delete_pdf', 'InvAbItemController@delete_pdf')->name('dropzone.delete_pdf');

