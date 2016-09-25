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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/{employee}', 'EmployeeController@view');
Route::delete('/employees/{employee}', 'EmployeeController@delete')->name('employees.delete');
Route::get('/employees/{employee}/edit', 'EmployeeController@edit');
Route::get('/employees/search/{search}', 'EmployeeController@search')->name('employees.search');
Route::patch('/employees/{employee}', 'EmployeeController@update');
Route::get('/subordinates/{employee}', 'EmployeeController@subordinates');
