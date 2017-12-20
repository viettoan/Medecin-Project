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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
    Route::get('home-admin', 'UserController@home')->name('home-admin');
    Route::resource('user', 'UserController');
    Route::put('changepass/{id}', 'UserController@changePass')->name('changepass');
    Route::resource('patient', 'PatientController');
    Route::post('patient/search', 'PatientController@search')->name('patient.search');
    Route::get('listPatients', 'PatientController@list');
    Route::resource('contact', 'ContactController');
    Route::get('listContacts', 'ContactController@list');
    Route::get('change-status-contact/{id}', 'ContactController@changeStatus');
    Route::resource('category', 'CategoryController');
    Route::get('listCategories', 'CategoryController@list');
    Route::resource('post', 'PostController');
    Route::post('searchPost', 'PostController@search')->name('search-post');
    Route::post('searchUser', 'UserController@search')->name('search.user');
    Route::post('searchContact', 'ContactController@search')->name('search.contact');
    Route::resource('specialist', 'SpecialistController');
    Route::resource('media-medical', 'MediaMedicalHistory');
    Route::get('list-specialist', 'SpecialistController@list')->name('list-specialist');
    Route::get('list-category', 'PostController@getListCategory')->name('list-category');
    Route::resource('doctor-calendar', 'DoctorCalendarController');
    Route::get('listCalendars', 'DoctorCalendarController@list');
    // Media
    Route::resource('sliders', 'SliderController');
    Route::get('listSliders', 'SliderController@list');
    Route::resource('videos', 'VideoController');
    Route::get('listVideos', 'VideoController@list');
});

Route::resource('/dangnhap-admin', 'LoginAdminController');
Route::post('/dangnhap', 'LoginAdminController@postLogin')->name('loginadmin');

Route::group(['namespace' => 'Site', 'prefix' => 'profile', 'middleware' => 'auth'], function () {
    Route::get('/thong-tin-ca-nhan/{id}', 'PatientController@show')->name('patient.profile.show');
    Route::get('/lich-su-kham/{id}', 'HistoryController@show')->name('patient.history.show');
    Route::get('/lich-bac-sy', 'DoctorCalenderController@index')->name('doctor.calender.show');
    Route::get('/video-sieu-am', function () {
	    return view('sites._components.userVideo', ['user' => Auth::user()]);
		});
});

Route::group(['namespace' => 'Site'], function() {
    Route::get('/chitiet/chuyenkhoa/{id}', 'IndexController@detailSpecial')->name('chitiet');
    Route::get('/danhchuyenkhoa', 'IndexController@listSpecial')->name('danhsach');
    Route::get('/', 'IndexController@index')->name('index');

    Route::get('/gioithieu', 'IntroController@index')->name('introduce');

    Route::get('/lienhe', 'ContactController@index')->name('contact');
    Route::post('/lienhe', 'ContactController@store')->name('contact.store');

    /* Route nay de cuoi cung k dong vao */
    Route::get('/{category}', 'PostController@index')->name('posts.index');

    Route::get('/{category}/{post_name}', 'PostController@show')->name('page.post.show');
});
