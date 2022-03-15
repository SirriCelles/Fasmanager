<?php
use App\Privilege;
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

    return redirect('/login');
});
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::group(['middleware' => ['admin']], function() {      
  
    Route::get('rooms', 'RoomController@index');
    //Route::get('add', 'RoomController@AddRoom');
     Route::post('rooms/store', 'RoomController@store')->name('rooms.store');
     Route::get('rooms/edit', 'RoomController@edit')->name('rooms.edit');
     Route::post('/rooms/update', 'RoomController@update')->name('rooms.update');
     Route::get('/rooms/delete', 'RoomController@destroy')->name('rooms.delete');  
     //Route::post('/rooms/search', 'RoomController@search');
     Route::post('/rooms/search', 'RoomController@searchRoom');
     Route::get('/createroom', 'RoomTypeController@index');
     Route::post('/createroom', 'RoomTypeController@store')->name('createroom.store');
     Route::get('/createroom/get_roomtype', 'RoomTypeController@edit')->name('createroom.get_roomtype');
     Route::post('createroom/update', 'RoomTypeController@UpdateRoomType')->name('createroom.update');
     Route::get('/createroom/delete', 'RoomTypeController@DeleteRoomType')->name('createroom.delete');

     Route::get('blocks/blocks','BlockController@index');
    Route::post('blocks/blocks/store','BlockController@store')->name('blocks.store'); 
    Route::get('blocks/blocks/show', 'BlockController@show')->name('blocks.show');
    Route::post('blocks/blocks/', 'BlockController@updateBlock')->name('blocks');
    Route::post('blocks/search', 'BlockController@searchBlock'); 
    Route::get('blocks/blocks/delete', 'BlockController@DeleteBlock')->name('blocks.delete');

    Route::get('cam/campus', 'CampusController@index');
    Route::post('cam/campus/store', 'CampusController@store')->name('campus.store');
    Route::get('cam/campus/campusDetails', 'CampusController@campusDetails')->name('campus.campusDetails');
    Route::get('cam/campus/show', 'CampusController@show')->name('campus.show');
    Route::post('cam/campus/update', 'CampusController@update')->name('campus.update');
    Route::get('cam/campus/delete', 'CampusController@destroy')->name('campus.delete');

    Route::get('/cam/campus/', 'AssetController@index')->name('manageAsset.index');
    Route::post('/cam/campus/', 'AssetController@store')->name('addAsset.store');
    Route::get('/cam/campus/showAsset', 'AssetController@show')->name('showAsset.show');
    Route::get('/cam/campus/editAsset', 'AssetController@edit');
    Route::post('/cam/campus/updateAsset', 'AssetController@update');
    Route::get('/cam/campus/deleteAsset', 'AssetController@destroy');

    //all routes for equipment and Equipement Type
    Route::post('/assets/etype', 'EquipmentTypeController@create');
    Route::get('/assets/equipment/edit_etype', 'EquipmentTypeController@edit');
    Route::post('/assets/etype/update', 'EquipmentTypeController@update');
    Route::get('/assets/etype/delete', 'EquipmentTypeController@delete');

    Route::get('/assets/equipment', 'EquipmentController@index');
    Route::post('/assets/equipment/store', 'EquipmentController@store');
    Route::get('/assets/equipment/edit', 'EquipmentController@edit');
    Route::post('/assets/equipment/update','EquipmentController@update');
    Route::get('/assets/equipment/delete', 'EquipmentController@destroy');

  });

  
 

 //this are the routes to MoMo to access the Mobile money API.
//  Route::get('momo/pay', 'PaymentController@makeMomoPayment')->name("MomoForm.show");
//  Route::post('momo/pay', 'PaymentController@processMomoPayment')->name("momoPayment.process");

});
Route::get('dashboard', 'UniversityController@index');




Route::group(['middleware'=> ['auth']], function () {

  Route::group(['middleware' => ['admin']], function() {
    Route::get('/admin', 'AdminController@index');
    Route::get('/roles', 'RoleController@index');
    Route::post('/roles/store', 'RoleController@store')->name('roles.store');
    Route::get('/roles/show', 'RoleController@show')->name('roles.show');
    
    Route::post('/roles/update', 'RoleController@update')->name('roles.update');

    Route::get('/roles/delete', 'RoleController@destroy')->name('roles.delete');
    
    Route::get('user/users', 'UserController@index');
    
    //Route::get('user/add', 'UserController@add');
    //Route::post('user/add', 'UserController@store');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::put('/user/users', 'UserController@update');
    Route::delete('/user/users', 'UserController@destroy');
    
    Route::get('/privileges', 'PrivilegeController@index');
    // Route::get('/roles', function(Privilege $privilege){
    //   return view('roles');
    // })->middleware('can:view,privilege');
    Route::post('/privileges/store', 'PrivilegeController@store')->name('privileges.store');
    Route::get('/privileges/get_privilege', 'PrivilegeController@show')->name('privileges.get_privilege');
    Route::get('/privileges/delete','PrivilegeController@destroy')->name('privileges.delete');
    Route::post('/privileges/update', 'PrivilegeController@update')->name('privileges.update');

    Route::get('/privileges/show_rolePrivileges', 'AssignController@show')->name('privileges.show_rolePrivileges');
    
    Route::post('/privileges/store_rolePrivileges', 'AssignController@store')->name('privileges.store_rolePrivileges');
    //Route::post('/privileges/update_rolePrivileges', 'AssignController@update')->name('privileges.update_rolePrivileges');

   });
  
});



//Route::get('admin', 'AdminController@index')->middleware();
Route::get('nopermission', 'RoleController@permissionDenied');


