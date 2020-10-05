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

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle');
Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all');
Route::resource('emergency-hotline', 'EmergencyHotlineController')->middleware('auth');
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

Route::post('/monitoring/store-active', 'EmployeeMonitoringController@employeeActiveCase')->name('monitoring.store_active');
Route::post('/monitoring/check-password', 'EmployeeMonitoringController@verifyPassword')->name('monitoring.verify-password');
Route::get('/monitoring/health-status', 'EmployeeMonitoringController@health_status')->name('monitoring.health_status')->middleware('auth');
Route::post('/monitoring/health-status/find-all','EmployeeMonitoringController@employee_health_condition')->name('monitoring.find-all-health-status')->middleware('auth');
Route::post('/monitoring/find-all','EmployeeMonitoringController@findall')->name('monitoring.find-all')->middleware('auth');
Route::get('monitoring/encoding', 'EmployeeMonitoringController@encoding')->middleware('auth');
Route::resource('monitoring', 'EmployeeMonitoringController')->middleware('auth');


/* company profiles */
Route::resource('company', 'CompanyProfileController')->middleware('auth');


/* shifting schedule */
Route::get('schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('shifting.all');
Route::resource('schedules', 'ShiftingScheduleController')->middleware('auth');
