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

Route::get('/', function () { return view('welcome'); });

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => ['auth', 'permission:1']], function () {
        
    /* employee */
    Route::post('/employee/edit-profile', 'EmployeeController@edit_profile')->name('employee.edit_profile');
    Route::get('/employee/profile', 'EmployeeController@profile')->name('employee.profile');
    Route::post('/employee/toggle/{id}', 'EmployeeController@togglestatus')->name('employee.toggle');
    Route::post('/employee/find-all','EmployeeController@findall')->name('employee.find-all');
    Route::resource('employee', 'EmployeeController');


    /* emergency hotine */
    Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle');
    Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all');
    Route::resource('emergency-hotline', 'EmergencyHotlineController');

    /* daily health monitoring */

    Route::get('/monitoring/health-history', 'EmployeeMonitoringController@health_history')->name('monitoring.health_history');
    Route::post('/monitoring/store-active', 'EmployeeMonitoringController@employeeActiveCase')->name('monitoring.store_active');
    Route::post('/monitoring/check-password', 'EmployeeMonitoringController@verifyPassword')->name('monitoring.verify-password');
    Route::get('/monitoring/health-status', 'EmployeeMonitoringController@health_status')->name('monitoring.health_status');
    Route::post('/monitoring/health-status/find-all','EmployeeMonitoringController@employee_health_condition')->name('monitoring.find-all-health-status');
    Route::post('/monitoring/find-all','EmployeeMonitoringController@findall')->name('monitoring.find-all');
    Route::get('monitoring/encoding', 'EmployeeMonitoringController@encoding');
    Route::resource('monitoring', 'EmployeeMonitoringController');


    /* company profiles */
    Route::resource('company', 'CompanyProfileController');


    /* shifting schedule */
    Route::post('/schedules/toggle/{id}', 'ShiftingScheduleController@togglestatus')->name('schedules.toggle');
    Route::get('/schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('schedules.all');
    Route::post('/schedules/find-all','ShiftingScheduleController@findall')->name('schedules.find-all');
    Route::resource('schedules', 'ShiftingScheduleController');


    Route::post('/covid_patient/find-all-by-status','EmployeeCovidStatusController@find_all_by_status')->name('covid_patient.find-all-by-status');
    Route::post('/covid_patient/find-all','EmployeeCovidStatusController@findall')->name('covid_patient.find-all');
    Route::resource('/covid_patient', 'EmployeeCovidStatusController');


    Route::get('/reports/positive', 'EmployeeCovidStatusController@positive')->name('report.positive');
    Route::get('/reports/suspected', 'EmployeeCovidStatusController@suspected')->name('report.suspected');
    Route::get('/reports/recovered', 'EmployeeCovidStatusController@recovered')->name('report.recovered');
    Route::get('/reports/deceased', 'EmployeeCovidStatusController@deceased')->name('report.deceased');

    Route::resource('/threshold', 'ThresholdController');
    
});

Route::group(['middleware' => ['auth', 'permission:2']], function () {
    Route::get('/monitoring/encoding', 'EmployeeMonitoringController@encoding');
    Route::get('/schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('schedules.all');
    Route::resource('/monitoring', 'EmployeeMonitoringController',['only'=>['store']]);
});
