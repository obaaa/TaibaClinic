<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

// Route::get('/patient', function () {
//     return view('patient.index');
// });

Route::resource('employees', 'EmployeeController');

Route::resource('settings', 'SettingsController');

Route::resource("patient", "PatientController");

Route::resource("checkeds", "CheckedController");

Route::resource("divisions_time", "Divisions_timeController");

Route::resource("work_times", "Work_timeController");

Route::post('employee_work_time', 'Work_timeController@employee_work_time');

Route::resource("visit", "VisitController");

Route::POST('visit_check', 'VisitController@visit_check');

Route::POST('visit/medical_report/', 'VisitController@medical_report');

Route::POST('payment', 'VisitController@payment');

Route::resource("appointment", "AppointmentController");

Route::resource("shift_employees", "Shift_employeeController");

// Route::get('/settings', function () {
//     return view('settings');
// });
