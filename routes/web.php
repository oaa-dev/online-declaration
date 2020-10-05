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
    return view('welcome');
});

Auth::routes();

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');



Route::post('/employee/store-active', 'EmployeeController@employeeActiveCase')->name('employee.store_active');
Route::post('/employee/check-password', 'EmployeeController@verifyPassword')->name('employee.verify-password');
Route::get('/employee/health-status', 'EmployeeController@health_status');
Route::post('/employee/find-all-health-status','EmployeeController@getEmployeeHealthStatus')->name('employee.find-all-health-status');

/* employee */
Route::post('/employee/toggle/{id}', 'EmployeeController@togglestatus')->name('employee.toggle');
Route::post('/employee/find-all','EmployeeController@findall')->name('employee.find-all');
Route::resource('employee', 'EmployeeController')->middleware('auth');





Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle');
Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all');
Route::resource('emergency-hotline', 'EmergencyHotlineController')->middleware('auth');
=======
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

/* employee */
Route::post('/employee/toggle/{id}', 'EmployeeController@togglestatus')->name('employee.toggle')->middleware('auth');
Route::post('/employee/find-all','EmployeeController@findall')->name('employee.find-all')->middleware('auth');
Route::resource('employee', 'EmployeeController')->middleware('auth');


/* emergency hotine */
Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle')->middleware('auth');
Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all')->middleware('auth');
Route::resource('emergency-hotline', 'EmergencyHotlineController')->middleware('auth');

/* daily health monitoring */
Route::get('/monitoring/health-status', 'EmployeeMonitoringController@health_status')->name('monitoring.health_status')->middleware('auth');
Route::post('/monitoring/health-status/find-all','EmployeeMonitoringController@employee_health_condition')->name('monitoring.find-all-health-status')->middleware('auth');
Route::post('/monitoring/find-all','EmployeeMonitoringController@findall')->name('monitoring.find-all')->middleware('auth');
Route::get('monitoring/encoding', 'EmployeeMonitoringController@encoding')->middleware('auth');
Route::resource('monitoring', 'EmployeeMonitoringController')->middleware('auth');

/* shifting schedule */
Route::get('schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('shifting.all');
Route::resource('schedules', 'ShiftingScheduleController')->middleware('auth');
>>>>>>> 9539f14280f5b15cf69e8d24f4b84a2644d07332
