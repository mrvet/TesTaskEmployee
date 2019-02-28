<?php

use Illuminate\Database\Schema;
//use App\Models\Employee;

use Illuminate\Support\Facades\DB;

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

    //$mainEmploees = Employee::where('boss' , '=' , null)->get();
    $mainEmploees = DB::table('employees')
                    ->where('boss' , '=' , null)
                    ->get()->toArray();

    echo '<pre>';

    var_dump($mainEmploees);

    echo '</pre>';

    return view('index',[
        'bossArray' => $mainEmploees
    ]);

});
