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

Route::post('/employee/toggle/{id}', 'EmployeeController@togglestatus')->name('employee.toggle');
Route::post('/employee/find-all','EmployeeController@findall')->name('employee.find-all');
Route::resource('employee', 'EmployeeController')->middleware('auth');



Route::post('/emergency-hotline/toggle/{id}', 'EmergencyHotlineController@togglestatus')->name('hotline.toggle');
Route::post('/emergency-hotline/find-all','EmergencyHotlineController@findall')->name('hotline.find-all');
Route::resource('emergency-hotline', 'EmergencyHotlineController')->middleware('auth');
