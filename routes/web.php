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

Route::resource("report", "ReportController");

Route::POST('visit_check', 'VisitController@visit_check');

Route::POST('visit/medical_report/', 'VisitController@medical_report');

Route::POST('visit/payment', 'VisitController@payment');

Route::POST('visit/checked', 'VisitController@checked');

Route::resource("shift_employees", "Shift_employeeController");

Route::resource("expense", "ExpenseController");

Route::resource("categorie", "CategorieController");

Route::POST("report/visit", "ReportController@visit");

Route::POST("report/visit_by_categorie", "ReportController@visit_by_categorie");

Route::POST("report/doctor", "ReportController@doctor");

Route::POST("report/expense", "ReportController@expense");

Route::POST("visit/print", "ReportController@report_print");

Route::get('/report_bill/{id}', 'ReportController@report_bill');

Route::post('visit/visit_image', 'VisitController@visit_image');

Route::post('visit/lab', 'LabController@add_to_lab');

Route::post('lab_update', 'LabController@lab_update');

Route::resource("lab", "LabController");
