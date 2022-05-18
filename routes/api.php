<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourcesController;
use GuzzleHttp\Promise\Create;

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

//- Usage of each operation (CRUD) (api endpoints)
Route::get('/resources', 'App\Http\Controllers\ResourcesController@index'); // for Filters
Route::get('/resources/{id}', 'App\Http\Controllers\ResourcesController@show'); //for CRUD -> Retrieve 
Route::post('/resources', 'App\Http\Controllers\ResourcesController@store'); // for CRUD -> Create
Route::put('/resources/{id}','App\Http\Controllers\ResourcesController@update'); // for CRUD -> Update
Route::delete('/resources/{id}', 'App\Http\Controllers\ResourcesController@destroy'); // for CRUD -> Delete






