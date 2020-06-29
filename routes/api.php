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
    Route::get('/index', 'FMS\CADController@show');
    Route::post('/create', 'API\FMS\CADController@create');
    Route::post('/update', 'API\FMS\CADController@update');
    Route::get('/{unit}/assign', 'FMS\CADController@assign');
    Route::get('/{id?}', 'FMS\CADController@getCad');
    Route::post('/remark', 'API\FMS\CADController@remark');
    Route::post('/assign', 'API\FMS\CADController@assign');
    Route::post('/state', 'API\FMS\CADController@state');
});

Route::group([
  'as' => 'mdt.',
  'prefix' => 'mdt',
  'middleware' => 'auth:api'
], function() {
  Route::get('/index', 'API\FMS\MDTController@show');
  Route::post('/remark', 'API\FMS\MDTController@remark');
});

Route::group([
  'as' => 'pnc.',
  'prefix' => 'pnc',
  'middleware' => 'auth:api'
], function() {
  Route::post('/person', 'API\FMS\PNCController@person');
});
