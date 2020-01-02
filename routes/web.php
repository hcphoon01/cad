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

// applicant routes
Route::group([
    'as' => 'application.',
    'prefix' => 'application',
    'middleware' => ['role:Applicant']
], function() {
    Route::get('status', 'HR\ApplicationController@status')->name('status');

    Route::get('form', 'HR\ApplicationController@form')->name('form');
    Route::post('form', 'HR\ApplicationController@createForm')->name('create-form');
});

// hr routes
Route::group([
    'as' => 'hr.',
    'prefix' => 'hr',
    'middleware' => ['role:Human Resources|Gold']
], function() {
    Route::get('index', 'HR\HRController@index')->name('index');
    Route::get('view/{id}', 'HR\HRController@show')->name('view');
});

Auth::routes(['verify' => true]);
Route::get('/home', 'Home\HomeController@index')->name('home')->middleware('role:Member');

// admin routes
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'middleware' => ['role:Gold']
], function () {
    Route::post('announcement/create', 'Admin\AnnouncementController@create')->name('create-announcement');
    Route::delete('announcement/{id}', 'Admin\AnnouncementController@destroy')->name('delete-announcement');
});

// profile routes
Route::group([
    'as' => 'profile.',
    'prefix' => 'profile',
    'middleware' => 'auth'
], function() {
    Route::get('index', 'Profile\ProfileController@index')->name('index');
});

Route::get('/fms/{vue_capture?}', 'FMS\CADController@index')->where('vue_capture', '[\/\w\.-]*')->middleware('auth');