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
// Route::get('company/{id}', 'CompanyProfileController@show');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// Route::get('/company/{id}', 'CompanyProfileController@show');

// Route::group(['middleware' => ['auth', 'permission:1']], function () {
    
    /* employee */
    Route::post('/employee/edit-profile', 'EmployeeController@edit_profile')->name('employee.edit_profile')->middleware('auth');
    Route::get('/employee/profile', 'EmployeeController@profile')->name('employee.profile')->middleware('auth');
    Route::post('/employee/toggle/{id}', 'EmployeeController@togglestatus')->name('employee.toggle')->middleware('auth');
    Route::post('/employee/find-all','EmployeeController@findall')->name('employee.find-all')->middleware('auth');
    Route::resource('employee', 'EmployeeController')->middleware('auth');


    /* emergency hotine */
    Route::get('/emergency-hotline/list','EmergencyHotlineController@list_here')->name('hotline.list')->middleware('auth');
    Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle')->middleware('auth');
    Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all')->middleware('auth');
    Route::resource('emergency-hotline', 'EmergencyHotlineController')->middleware('auth');

    /* daily health monitoring */
    
    Route::get('/monitoring/getAllHighRisk', 'EmployeeMonitoringController@getAllHighRisk')->name('monitoring.getAllHighRisk')->middleware('auth');
    Route::get('/monitoring/health-history', 'EmployeeMonitoringController@health_history')->name('monitoring.health_history')->middleware('auth');
    Route::post('/monitoring/store-active', 'EmployeeMonitoringController@employeeActiveCase')->name('monitoring.store_active')->middleware('auth');
    Route::post('/monitoring/check-password', 'EmployeeMonitoringController@verifyPassword')->name('monitoring.verify-password')->middleware('auth');
    Route::get('/monitoring/health-status', 'EmployeeMonitoringController@health_status')->name('monitoring.health_status')->middleware('auth');
    Route::post('/monitoring/health-status/find-all','EmployeeMonitoringController@employee_health_condition')->name('monitoring.find-all-health-status')->middleware('auth');
    Route::post('/monitoring/find-all','EmployeeMonitoringController@findall')->name('monitoring.find-all')->middleware('auth');
    Route::get('monitoring/encoding', 'EmployeeMonitoringController@encoding')->middleware('auth');
    Route::resource('monitoring', 'EmployeeMonitoringController')->middleware('auth');


    /* company profiles */
    Route::resource('company', 'CompanyProfileController');


    /* shifting schedule */
    Route::post('/schedules/toggle/{id}', 'ShiftingScheduleController@togglestatus')->name('schedules.toggle')->middleware('auth');
    Route::get('/schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('schedules.all')->middleware('auth');
    Route::post('/schedules/find-all','ShiftingScheduleController@findall')->name('schedules.find-all')->middleware('auth');
    Route::resource('schedules', 'ShiftingScheduleController')->middleware('auth');

    Route::get('/covid_patient/statistics', 'EmployeeCovidStatusController@statistics')->middleware('auth');
    Route::post('/covid_patient/find-all-by-status','EmployeeCovidStatusController@find_all_by_status')->name('covid_patient.find-all-by-status')->middleware('auth');
    Route::post('/covid_patient/find-all','EmployeeCovidStatusController@findall')->name('covid_patient.find-all')->middleware('auth');
    Route::resource('/covid_patient', 'EmployeeCovidStatusController')->middleware('auth');


    Route::get('/reports/positive', 'EmployeeCovidStatusController@positive')->name('report.positive')->middleware('auth');
    Route::get('/reports/suspected', 'EmployeeCovidStatusController@suspected')->name('report.suspected')->middleware('auth');
    Route::get('/reports/recovered', 'EmployeeCovidStatusController@recovered')->name('report.recovered')->middleware('auth');
    Route::get('/reports/deceased', 'EmployeeCovidStatusController@deceased')->name('report.deceased')->middleware('auth');

    Route::resource('/threshold', 'ThresholdController')->middleware('auth');

    
    Route::post('/covid_monitoring/find-all','CovidPatientMonitoringController@findall')->name('covid_monitoring.find-all')->middleware('auth');
    Route::resource('/covid_monitoring', 'CovidPatientMonitoringController')->middleware('auth');
    
// })

// Route::group(['middleware' => ['auth', 'permission:1,2']], function () {
    // Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all')->middleware('auth');
    // Route::get('/emergency-hotline/list','EmergencyHotlineController@list_here')->name('hotline.list');
    // Route::get('/monitoring/encoding', 'EmployeeMonitoringController@encoding');
    // Route::get('/schedules/find-for-combobox', 'ShiftingScheduleController@findall2')->name('schedules.all');
    // Route::resource('/monitoring', 'EmployeeMonitoringController',['only'=>['store']]);
// });
