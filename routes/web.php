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
    return view('auth.login');
});
Route::get('/logoutuser', 'UserController@logout');
//resources
Auth::routes();
Route::prefix('/app')->group(function () {
    Route::resource('/usertype', 'UserTypeController');
    Route::resource('/user', 'UserController');
    Route::resource('/articulate', 'ArticulatController');
});






//setting
Route::post('/app/updateUser','UserController@updateUser');
Route::get('/app/profile', 'UserController@profile');
Route::post('/app/changepassword', 'UserController@changePass');
Route::post('/app/updatepassword', 'UserController@updatepassword');
Route::post('/app/avatar','UserController@avatar');




Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{any}', 'HomeController@index');
Route::get('/{any}/{slug}', 'HomeController@index');
Route::get('/{any}/{slug}/{id}', 'HomeController@index');