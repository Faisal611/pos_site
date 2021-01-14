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

Route::get('/','HomesController@index');

/*
|--------------------------------
| Admin Group
|--------------------------------
 */
//-----------Group----------------------//
Route::get('create_user','UserGroupController@index');
Route::get('create_newGroup','UserGroupController@newGroup');
Route::post('create_postGroup','UserGroupController@store');
Route::delete('delete/{id}','UserGroupController@destroy');

//-----------Group----------------------//
Route::get('users','UsersController@index');
Route::get('users_post','UsersController@userGroup');
Route::post('users_postGroup','UsersController@store');
Route::get('edit/{id}','UsersController@edit');
Route::post('update_user_data','UsersController@updateUser');

Route::delete('delete/{id}','UsersController@destroy');

//Route::get('createe','UsersController@createe');
