<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
Route::post('/register','App\Http\Controllers\UserController@register');
Route::post('/login','App\Http\Controllers\UserController@login');


Route::post('/ticket','App\Http\Controllers\TicketController@create');
Route::get('/ticket/{id}', 'App\Http\Controllers\TicketController@showbyid');
Route::put('/ticket/{id}','App\Http\Controllers\TicketController@update');
Route::get('/tickets','App\Http\Controllers\TicketController@show');