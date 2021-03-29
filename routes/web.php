<?php

use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('login');
})->middleware('guest'); //middleware sebagai guest (agar tidak bisa langsung login)
// user()->assignRole('admin'); /for role
// });


Route::get('/admin', 'AdminController@index');

//employee
Route::get('/employee', 'EmployeeController@index');
Route::get('/create_employee', 'EmployeeController@create');
Route::post('/create_employee','EmployeeController@store')->name('addEmployee');
Route::delete('/employee/{employee}', 'EmployeeController@destroy');
Route::delete('/employee/{user}', 'EmployeeController@destroy'); //user
Route::get('/employee/{employee}/edit', 'EmployeeController@edit');
Route::patch('/employee/{employee}', 'EmployeeController@update');

// route approval
Route::get('/approve', 'ApproveController@index');
Route::get('/attendance_list/{attendances}', 'ApproveController@attendanceList');
Route::patch('/attendance_list/{attendance}', 'ApproveController@approve')->name('approve');
Route::post('/attendance_list/{attendance}', 'ApproveController@reject')->name('reject');



Route::get('/location', 'LocationController@index');
Route::get('/client', 'ClientController@index');

// route project
Route::get('/project', 'ProjectController@index');
Route::post('/project', 'ProjectController@store');
Route::delete('/project/{project}', 'ProjectController@destroy');
Route::patch('/project/{project}', 'ProjectController@update');

Route::get('/work_status', 'WorkStatusController@index');
Route::get('/attendance_report', 'AttendanceReportController@index');

// route Attendance User
Route::get('/attendance', 'AttendanceController@index');
Route::post('/attendance_absent', 'AttendanceController@storeAbsent');
Route::post('/attendance_present', 'AttendanceController@storePresent');


Route::get('/biodata', 'ProfileController@biodata');
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


Route::get('/test', 'TestController@index');
