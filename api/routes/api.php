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

Route::resource('tipoCargo', 'tipoCargoController');
Route::resource('chapa', 'ChapaController');
Route::resource('participante', 'ParticipanteController');
Route::middleware('auth:api')->get('/user', function (Request $request) {

});
