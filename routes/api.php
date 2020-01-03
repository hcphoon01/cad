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

Route::group([
    'as' => 'cad.',
    'prefix' => 'cad',
    'middleware' => 'auth:api'
], function () {
    Route::get('/index', 'FMS\CADController@show')->name('show');
    Route::get('/create', 'FMS\CADController@create')->name('create');
    Route::get('/{unit}/assign', 'FMS\CADController@assign')->name('assign');
});
