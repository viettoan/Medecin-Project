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
    Route::resource('contact', 'ContactController');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/gioithieu', function () {
    return view('sites.gioithieu.index');
});
Route::get('/chuyenkhoa', function () {
    return view('sites.chuyenkhoa.index');
});
Route::get('/tintuc', function () {
    return view('sites.tintuc.index');
});
Route::get('/post', function () {
    return view('sites.post.index');
});

Route::get('/lienhe', function () {
    return view('sites.lienhe.index');
});

Route::group(['as' => 'site.', 'namespace' => 'Site'], function () {
    Route::resource('/thong-tin-ca-nhan', 'ProfileUser');
    Route::resource('/lich-su-kham', 'History');
    Route::resource('/lich-bac-sy', 'DoctorCalender');
});


Route::get('/store', function() {
    Storage::disk('local')->put('file.txt', 'Hay lam ddmm');
});