<?php

use Illuminate\Http\Request;

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
	
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');

Route::middleware('jwt-auth')->get('/user', function (Request $request) {
	$user = \JWTAuth::toUser($request->get('token'));
    return $user;
});
