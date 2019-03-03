<?php

use Illuminate\Database\Schema;

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

//Route::get('/', function () {
//
//    return view('index',[
//        'bossArray' => $mainEmploees
//    ]);
//
//});

Route::get('/', 'EmployeeController@GetBossEmployees');
Route::get('/get-employees', 'EmployeeController@GetBossEmployeesAjax');
Route::get('/get-employeesByBoss', 'EmployeeController@GetEmployeesByBossAjax');
