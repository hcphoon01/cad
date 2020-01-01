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

// admin routes
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin'
], function () {
    Route::post('announcement/create', 'Admin\AnnouncementController@create')->name('create-announcement');
    Route::delete('announcement/{id}', 'Admin\AnnouncementController@destroy')->name('delete-announcement');
});

// profile routes
Route::group([
    'as' => 'profile.',
    'prefix' => 'profile'
], function() {
    Route::get('index', 'Profile\ProfileController@index')->name('index');
});

Route::get('/fms/{vue_capture?}', 'FMS\CADController@index')->where('vue_capture', '[\/\w\.-]*')->middleware('auth');