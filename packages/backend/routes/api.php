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

Route::post('/sound', 'Api\\SoundController@paginate');
Route::get('/sound/groups', 'Api\\SoundController@groups');
Route::get('/stats/all', 'Api\\StatController@all');
Route::get('/correction', 'Api\\CorrectionController@paginate');
Route::post('/correction/add/{id}', 'Api\\CorrectionController@add');
Route::post('/correction/accept/{id}', 'Api\\CorrectionController@accept');
Route::post('/correction/decline/{id}', 'Api\\CorrectionController@decline');

Route::get('/group', 'Api\\GroupController@all');
