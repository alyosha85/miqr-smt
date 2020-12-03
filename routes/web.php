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

Auth::routes();

Route::get('/home',function(){
    return view('admin.admin_dashboard')->name('home');
});
Route::get('/',function(){
    return view('admin/admin_dashboard');
});


// one time query from temp to inv_ab_item table
Route::get('/sync','TempInvAbItemController@index')->name('sync');

// item search query
Route::get('/search','InvAbItemController@search')->name('search');

// Ajax Routes
    // search Check
Route::post('search_check','InvAbItemController@searchCheck')->name('search_check');
    // create Address and room lists
Route::get('/items/create','InvAbItemController@create')->name('items.create');
    // query last InvNumber
Route::get('/auto','InvLastNumberController@index')->name('auto');

//Inventory  Controllers
Route::get('/inventory','InvAbItemController@index')->name('inventory');
Route::get('/item/create','InvAbItemController@create')->name('item.create');
Route::get('/item/create_man','InvAbItemController@create_man')->name('item.create_man');
Route::patch('/item/update/{id}','InvAbItemController@update')->name('item.update');
Route::post('/item','InvAbItemController@store')->name('item.store');
Route::get('/print/{printinvnr}/{anzahl}','InvAbItemController@printlabel')->name('printlabel');


// pdf upload
Route::post('dropzone/upload_pdf', 'InvAbItemController@upload_pdf')->name('dropzone.upload_pdf');
// show pdf
Route::get('dropzone/fetch_pdf', 'InvAbItemController@fetch_pdf')->name('dropzone.fetch_pdf');
// delete pdf
Route::get('dropzone/delete_pdf', 'InvAbItemController@delete_pdf')->name('dropzone.delete_pdf');

