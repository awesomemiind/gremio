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


Route::get('test', function () {
    return 'works';
});
Route::group(['middleware' => 'api', 'prefix' => 'auth'], function() {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');


});

Route::group(['middleware' => 'jwt.auth'], function() {
    Route::post('auth/me', 'AuthController@me');
    Route::resource('tipoCargo', 'tipoCargoController');
    Route::resource('chapa', 'ChapaController');
    Route::resource('participante', 'ParticipanteController');
});


