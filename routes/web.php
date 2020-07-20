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
    'middleware' => [
        'role:Applicant',
        'verified'
    ]
], function () {
    Route::get('status', 'HR\ApplicationController@status')->name('status');

    Route::get('form', 'HR\ApplicationController@form')->name('form');
    Route::post('form', 'HR\ApplicationController@createForm')->name('create-form');
});

// hr routes
Route::group([
    'as' => 'hr.',
    'prefix' => 'hr',
    'middleware' => ['role:Human Resources|Gold']
], function () {
    Route::get('index', 'HR\HRController@index')->name('index');
    Route::get('view/{id}', 'HR\HRController@show')->name('view');
    Route::get('progress/{applicant}', 'HR\HRController@progress')->name('progress');
});

Auth::routes([
    'verify' => true,
    'register' => false
]);

Route::get('/register/{token}', 'User\UserController@showPassword')->name('auth.password.show');
Route::post('/register/{token}', 'User\UserController@storePassword')->name('auth.password.store');

Route::get('/home', 'Home\HomeController@index')->name('home')->middleware('role:Member');
Route::post('/book-on', 'FMS\CADController@bookOn')->name('book-on')->middleware('role:Member');

// admin routes
Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
], function () {
    Route::post('announcement/create', 'Admin\AnnouncementController@create')->name('create-announcement');
    Route::delete('announcement/{id}', 'Admin\AnnouncementController@destroy')->name('delete-announcement');
    Route::post('event/{id}', 'Admin\AdminController@event')->name('event');
});

// profile routes
Route::group([
    'as' => 'profile.',
    'prefix' => 'profile',
    'middleware' => ['role:Member']
], function () {
    Route::get('index', 'Profile\ProfileController@index')->name('index');
});

// duty listing routes
Route::group([
    'as' => 'duty.',
    'prefix' => 'duty',
    'middleware' => ['permission:manage duty listings']
], function () {
    Route::get('/', 'Duty\DutyController@index')->name('index');
    Route::post('/assign', 'Duty\DutyController@assign')->name('assign');
    Route::post('/assign-control', 'Duty\DutyController@assignControl')->name('assign-control');
    Route::post('/unit', 'Duty\DutyController@unit')->name('unit');
    Route::get('/delete/{id}', 'Duty\DutyController@delete')->name('delete');
    Route::get('/book-off/{id}', 'Duty\DutyController@bookOff')->name('book-off');
});

Route::group([
    'as' => 'users.',
    'prefix' => 'users',
    'middleware' => ['permission:update ranks']
], function () {
    Route::get('/', 'User\UserController@index')->name('index');
    Route::get('/create', 'User\UserController@create')->name('create');
    Route::post('/', 'User\UserController@store')->name('store');
    Route::get('/show/{id}', 'User\UserController@show')->name('show');
    Route::post('/show/{id}', 'User\UserController@update')->name('update');
});

// vehicle maintenance routes
Route::group([
    'as' => 'vehicle.',
    'prefix' => 'vehicle',
    'middleware' => ['permission:manage vehicles']
], function () {
    Route::get('/', 'Vehicle\VehicleController@index')->name('index');
    Route::get('/show/{id}', 'Vehicle\VehicleController@show')->name('show');
    Route::post('/show/{id}', 'Vehicle\VehicleController@update')->name('update');
    Route::get('/delete/{id}', 'Vehicle\VehicleController@delete')->name('delete');
    Route::post('/create', 'Vehicle\VehicleController@create')->name('create');
    Route::get('/bulk', 'Vehicle\VehicleController@bulkIndex')->name('bulk.index');
    Route::post('/bulk/import', 'Vehicle\VehicleController@bulkImport')->name('bulk.import');
});

// civilian routes
Route::group([
    'as' => 'civilian.',
    'prefix' => 'civilian',
    'middleware' => ['role:Member']
], function () {
    Route::get('/', 'Civilian\CivilianController@index')->name('index');
    Route::post('/person', 'Civilian\CivilianController@person')->name('person');
    Route::post('/vehicle', 'Civilian\CivilianController@vehicle')->name('vehicle');
    Route::post('/cad', 'Civilian\CivilianController@cad')->name('cad');
});

Route::get('/fms/{vue_capture?}', 'FMS\CADController@index')->where('vue_capture', '[\/\w\.-]*')->middleware('role:Member');
