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

Route::get('/', function () {
	return view('index');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

	Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
	    Route::get('/', function () {
	        return view('admin.master');
	    });
    Route::resource('user', 'UserController');
    Route::resource('patient', 'PatientController');
});

Route::group(['prefix' => 'site', 'as' => 'site', 'namespace' => 'Site'], function () {
    Route::resource('profileUser', 'ProfileUser');
});

