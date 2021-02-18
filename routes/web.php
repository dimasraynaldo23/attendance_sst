<?php


Route::get('/', function () {
    return view('login');
})->middleware('guest'); //middleware sebagai guest (agar tidak bisa langsung login)

Route::get('/admin', 'AdminController@index');

Route::get('/employee', 'EmployeeController@index');
Route::get('/location', 'LocationController@index');
Route::get('/client', 'ClientController@index');
Route::get('/project', 'ProjectController@index');
Route::get('/work_status', 'WorkStatusController@index');
Route::get('/attendance_cataloger', 'AttendanceController@cataloger');
Route::get('/attendance_developer', 'AttendanceController@developer');

Route::get('/user', 'UserController@index');
// Route::get('/profile', 'ProfileController@index');
Route::get('/biodata', 'ProfileController@biodata');
// Route::get('/edit_profile', 'ProfileController@edit');
Route::get('/attendance_summary', 'SummaryController@index');

//editcoba1
Route::group(['middleware' => 'auth'], function() {
    Route::get('edit_profile', 'ProfileController@edit');

    Route::post('/edit_profile_update', 'ProfileController@update'); //update
});

//editcoba2
// Route::post('edit_profile', 'ProfileController@update');


Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout')->name('logout'); //route untuk logout
Route::get('/home', 'HomeController@index')->name('home');
