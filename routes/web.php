<?php

use App\Http\Controllers\InvAbItemController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function() {
  Route::resource('roles','RoleController');
  Route::resource('users','UserController'); //add to User Modal protected $guard_name = 'web';
  Route::resource('permissions','PermissionController');



  // one time query from temp to inv_ab_item table
Route::get('/sync','TempInvAbItemController@index')->name('sync');
// query last InvNumber
Route::get('/auto','InvLastNumberController@index')->name('auto');

//*************************************************   Inventory Index  *********************************************************************/
Route::get('/inventory','InvAbItemController@index')->name('inventory');

//***********************  machinelist Items   *********************************/
Route::get('/machinelist','InvAbItemController@machinelist')->name('machine_list');
Route::get('/machinelistall','InvAbItemController@machinelistall')->name('machine_list_all');

//***********************  Create Items   *********************************/
// create Address and room lists
Route::get('/item/create','InvAbItemController@create')->name('item.create');
Route::post('/item','InvAbItemController@store')->name('item.store');
//*********  PDF Upload   ***********/
Route::post('dropzone/upload_pdf', 'InvAbItemController@upload_pdf')->name('dropzone.upload_pdf');
Route::get('dropzone/fetch_pdf', 'InvAbItemController@fetch_pdf')->name('dropzone.fetch_pdf');
Route::get('dropzone/delete_pdf', 'InvAbItemController@delete_pdf')->name('dropzone.delete_pdf');

///***********************  Create Items Manuall   *************************/
Route::get('/item/create_man','InvAbItemController@create_man')->name('item.create_man');
Route::post('/item_man','InvAbItemController@storeMan')->name('item.storeMan');
//**********  PDF Upload Man  ********************/
Route::post('dropzone/upload_pdf_man', 'InvAbItemController@upload_pdf_man')->name('dropzone.upload_pdf_man');
Route::get('dropzone/fetch_pdf_man', 'InvAbItemController@fetch_pdf_man')->name('dropzone.fetch_pdf_man');
Route::get('dropzone/delete_pdf_man', 'InvAbItemController@delete_pdf_man')->name('dropzone.delete_pdf_man');

//*********************  Edit Items   **************************************/
Route::get('/search_edit','InvAbItemController@search_edit')->name('search_edit');
Route::post('search_check_edit','InvAbItemController@searchCheckEdit')->name('search_check_edit');
Route::patch('/item/update','InvAbItemController@update')->name('item.update');
// Route::post('autocompleteedit','InvAbItemController@autocompleteEdit')->name('autocompleteEdit');

//*********************  Move Items   **************************************/
Route::get('/search_move','InvAbItemController@search_move')->name('search_move');
Route::post('search_check_move','InvAbItemController@searchCheckMove')->name('search_check_move');
Route::post('/item_move_store','InvAbItemController@movestore')->name('item_move_store');

//*********************  Move Items   **************************************/
Route::get('/item/move','InvAbItemController@move')->name('item.move');

//*********************  Invalidation Items  Ausmusterung  *****************/
Route::get('/search','InvAbItemController@search')->name('search');
Route::post('search_check','InvAbItemController@searchCheck')->name('search_check');
Route::post('/invalid','InvAbItemController@invalid')->name('invalid');

//*****************************  PrintLabel  ****************************************/
Route::get('/print/{printinvnr}/{anzahl}','InvAbItemController@printlabel')->name('printlabel');

//*****************************  Print Listen  **************************************/
Route::get('/item/listen','InvAbItemController@listen')->name('item.listen');
Route::post('/room_listen','InvAbItemController@items_in_room_listen')->name('items_in_room_listen');

//********************************    Items Inventory  ******************************/
Route::get('/item/inventur','InvAbItemController@inventur')->name('item.inventur');     //Item Inventur
Route::post('/room_inventur','InvAbItemController@roomInventur')->name('roomInventur'); //room Inventur
Route::get('room/inventur/{invnr?}','InvAbItemController@getinvnr')->name('getinvnr');  //list add item in Inventur room listlist
Route::post('/inventur_store_final','InvAbItemController@inventurStoreFinal')->name('inventurStoreFinal'); //store
Route::post('/auto_change_location','InvAbItemController@autoChangeLocation')->name('autoChangeLocation'); //auto change room
Route::post('/send_unordered_computers','InvAbItemController@sendUnorderedComputers')->name('sendUnorderedComputers'); //send unordered computers
Route::get('/print_inventur','InvAbItemController@printinventur')->name('printinventur');


/******************************************  Settings  ******************************************************/
Route::get('/settings','SettingController@index')->name('setting_index');
/* Add City */
Route::post('/create_city','PlaceController@addCity')->name('addCity');
/* Add Location City list *AJAX* */
Route::get('/settings/cityList','LocationController@cityList')->name('settings.cityList');
Route::get('/settings/cityAddressList','InvRoomController@cityAddressList')->name('settings.cityAddressList');
/* Add Location City ROOM  (Add - Save )*/
Route::post('/create_address','LocationController@addLocation')->name('addLocation');
Route::post('/create_room','InvRoomController@addRoom')->name('addRoom');

/* Role index */
Route::get('/settings/roleList','RoleController@index')->name('settings.roleList');
/* users index */
Route::get('/settings/usersList','UserController@index')->name('settings.usersList');
/* first page */
Route::get('/settings/firstpage/{id}/edit','SettingController@firstpage')->name('settings.firstpage'); 
Route::patch('/settings/firstpage/{id}','SettingController@firstupdate')->name('settings.firstupdate'); 

/******************************************  Profile  ******************************************************/
Route::get('/profile',function(){
  return view('user.profile');
});


/******************************************  Matrix  ******************************************************/
Route::get('/matrix/berlin','Matrix\BerlinController@index')->name('matrix.berlin');


