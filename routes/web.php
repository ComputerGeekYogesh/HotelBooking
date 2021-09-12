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
    return view('admin.dashboard');
});


//* roomtype controller

 Route::get('roomtype','App\Http\Controllers\Admin\RoomtypeController@index');
 Route::post('roomtype-store','App\Http\Controllers\Admin\RoomtypeController@store');
 Route::get('roomtype-edit/{id}', 'App\Http\Controllers\Admin\RoomtypeController@edit');
 Route::put('roomtype-update/{id}', 'App\Http\Controllers\Admin\RoomtypeController@update');
 Route::delete('/roomtype-delete/{id}', 'App\Http\Controllers\Admin\RoomtypeController@delete');


//* room controller

Route::get('room','App\Http\Controllers\Admin\RoomController@index');
Route::post('room-store','App\Http\Controllers\Admin\RoomController@store');
Route::get('room-edit/{id}', 'App\Http\Controllers\Admin\RoomController@edit');
Route::put('room-update/{id}', 'App\Http\Controllers\Admin\RoomController@update');
Route::delete('/room-delete/{id}', 'App\Http\Controllers\Admin\RoomController@delete');


//* floor controller

Route::get('floor','App\Http\Controllers\Admin\FloorController@index');
Route::post('floor-store','App\Http\Controllers\Admin\FloorController@store');
Route::get('floor-edit/{id}', 'App\Http\Controllers\Admin\FloorController@edit');
Route::put('floor-update/{id}', 'App\Http\Controllers\Admin\FloorController@update');
Route::delete('/floor-delete/{id}', 'App\Http\Controllers\Admin\FloorController@delete');


//* staff controller

Route::get('staff','App\Http\Controllers\Admin\StaffController@index');
Route::post('staff-store','App\Http\Controllers\Admin\StaffController@store');
Route::get('staff-edit/{id}', 'App\Http\Controllers\Admin\StaffController@edit');
Route::put('staff-update/{id}', 'App\Http\Controllers\Admin\StaffController@update');
Route::delete('/staff-delete/{id}', 'App\Http\Controllers\Admin\StaffController@delete');


//* guest controller

Route::get('guest','App\Http\Controllers\Admin\GuestController@index');
Route::post('guest-store','App\Http\Controllers\Admin\GuestController@store');
Route::get('guest-edit/{id}', 'App\Http\Controllers\Admin\GuestController@edit');
Route::put('guest-update/{id}', 'App\Http\Controllers\Admin\GuestController@update');
Route::delete('/guest-delete/{id}', 'App\Http\Controllers\Admin\GuestController@delete');

//* roomtype controller

Route::get('roomtype','App\Http\Controllers\Admin\RoomtypeController@index');
Route::post('roomtype-store','App\Http\Controllers\Admin\RoomtypeController@store');
Route::get('roomtype-edit/{id}', 'App\Http\Controllers\Admin\RoomtypeController@edit');
Route::put('roomtype-update/{id}', 'App\Http\Controllers\Admin\RoomtypeController@update');
Route::delete('/roomtype-delete/{id}', 'App\Http\Controllers\Admin\RoomtypeController@delete');
