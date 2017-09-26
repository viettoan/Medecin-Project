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

Auth::routes();

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
    Route::get('/', function () {
        return view('admin.master');
    });
    Route::resource('user', 'UserController');
    Route::resource('patient', 'PatientController');
    Route::resource('contact', 'ContactController');
    Route::get('change-status-contact/{id}', 'ContactController@changeStatus');
    Route::resource('category', 'CategoryController');
    Route::resource('post', 'PostController');
    Route::resource('specialist', 'SpecialistController');
    Route::resource('media-medical', 'MediaMedicalHistory');
    Route::get('list-specialist', 'SpecialistController@list')->name('list-specialist');
});

Route::group(['namespace' => 'Site'], function() {
    Route::get('/', function () {
        return view('index');
    })->name('index');
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
    Route::post('/lienhe', 'ContactController@store')->name('contact.store');
});
Route::resource('/dangnhap-admin', 'LoginAdminController');
Route::post('/dangnhap', 'Auth\LoginController@postLogin')->name('loginadmin');
Route::group(['namespace' => 'Site', 'middleware' => 'auth'], function () {
    Route::get('/thong-tin-ca-nhan/{id}', 'PatientController@show')->name('patient.profile.show');
    Route::get('/lich-su-kham/{id}', 'HistoryController@show')->name('patient.history.show');
    Route::get('/lich-bac-sy', 'DoctorCalenderController@index')->name('doctor.calender.show');
    Route::get('/video-sieu-am/{id}', function () {
	    return view('sites._components.userVideo');
		});
});
