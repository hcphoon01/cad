<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Home\HomeController@landing')->name('landing')->middleware('guest');

Auth::routes(['verify' => true]);
Route::get('/home', 'Home\HomeController@index')->name('home')->middleware('auth');

// gold command routes
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin'
], function () {
    Route::post('announcement/create', 'Admin\AnnouncementController@create')->name('create-announcement');
});