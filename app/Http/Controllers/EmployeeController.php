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

    public function GetEmployee( $id ){

        $employee = Employee::where('id','=',$id)
            ->with(['position' , 'boss'])
            ->get()
            ->toArray();

        return view('employee', [
            'employee' => $employee ? $employee[0] : null
        ]);

    }//GetEmployee


    public function GetEmployeesList( ){

        $employees = Employee::
            with(['position' , 'boss'])
            ->take(10)
            ->get()
            ->toArray();


        //echo var_dump($employees);

        return view('employeeslist', [
            'employes' => $employees
        ]);

    }//GetEmployee


    public function GetEmployeesListAjax( Request $r ){

        $limit = intval($r->get('limit'));
        $offset = intval($r->get('offset'));

        $order = $r->get('order');
        $column = $r->get('column');

        if($order){


            $employees = Employee::
            with(['position' , 'boss'])
                ->skip($offset)
                ->take($limit)
                ->orderBy($column , $order)
                ->get()
                ->toJson();

        }//if
        else{

            $employees = Employee::
            with(['position' , 'boss'])
                ->skip($offset)
                ->take($limit)
                ->get()
                ->toJson();

        }//else


        return $employees;

    }//GetEmployee
}
