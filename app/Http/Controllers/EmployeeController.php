<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use function MongoDB\BSON\toJSON;


class EmployeeController extends Controller{
    
    public function GetBossEmployees(  ){

//        $mainEmployees = Employee::where('boss' , '=' , null)
//            ->join('positions', 'employees.position', '=', 'positions.id')
//            ->get()
//            ->toArray();

        $mainEmployees = Employee::where('boss' , '=' , null)
            ->with(['position'])
            ->get()
            ->toArray();

//        echo '<pre>';
//
//        var_dump($mainEmployees);
//


        return view('index',[
            'bossArray' => $mainEmployees
        ]);

    }

    public function GetBossEmployeesAjax(  ){

        $mainEmployees = Employee::where('boss' , '=' , null)
            ->with(['position'])
            ->get()
            ->toJson();

        return $mainEmployees;

    }


    public function GetEmployeesByBossAjax( Request $request ){
//
        $limit = $request->limit;
        $offset = $request->offset;
        $id = $request->get('id');

        $mainEmployees = Employee::where('boss' , $id)
            ->with(['position'])
            ->get()
            ->toJson();

        return $mainEmployees;

    }

}
