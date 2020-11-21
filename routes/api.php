<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/userregister', 'API\UserController@register');
Route::post('/mentorregister', 'API\MentorController@register');
Route::post('/login', 'API\UserController@login');
Route::get('/logout', 'API\UserController@logout')->middleware('auth:api');
Route::get('/account', 'API\UserController@account')->middleware('auth:api');
Route::post('/updateprofile', 'API\UserController@update')->middleware('auth:api');
Route::post('/changepassword', 'API\UserController@changePass')->middleware('auth:api');
Route::post('/avatar', 'API\UserController@avatar')->middleware('auth:api');

Route::resource('/articulate', 'API\ArticulatController')->middleware('auth:api');



// forget password
Route::post('forget', 'Auth\ForgotPasswordController@getResetToken');