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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/signup','AdviceMeController@create');
Route::post('/login','AdviceMeController@login');
Route::get('/logout','AdviceMeController@logout');
Route::post('/problem','AdviceMeController@problem');
Route::post('/advice','AdviceMeController@advice');
Route::get('/mainPage','AdviceMeController@mainPage');