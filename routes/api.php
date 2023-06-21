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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('tags/index','Api\ApiController@getTages');
Route::get('tag/index/{id}','Api\ApiController@getTag');
Route::get('tag/delete/{tag}','Api\ApiController@delete');
Route::Post('tag/create','Api\ApiController@create')->middleware('auth:sanctum');
Route::Post('tag/update/{id}','Api\ApiController@updateTag');
Route::Post('admin/store','Api\AccessTokenController@store');
Route::delete('admin/delete/{token?}','Api\AccessTokenController@destroy')
->middleware('auth:sanctum');