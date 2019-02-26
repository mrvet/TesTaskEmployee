<?php

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(Employee::class, 50)->create()->each(function ($u , $index) {

            $employee = Employee::first();

            if($index === 0){
                $u->boss = $employee->id;
            }//if
            else{
                $u->boss = null;
            }//else

            $u->save();

        });;

    }
}
