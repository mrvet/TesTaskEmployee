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

        factory(Employee::class, 5)->create()->each(function ($u) {

            $u->boss = null;
            $u->position = 2;
            $u->save();

        });

        $employees = factory(Employee::class, 5000)->create();

        $employees->each(function ($u) use ($employees) {

            $employee = Employee::inRandomOrder()->limit(1)->get()->toArray();

            var_dump($employee[0]);

            $employee = $employee[0];

            if( $employee['boss'] !=  $u->id ){

                $u->boss = $employee['id'];
                $u->save();

            }//if
//
//
        });

    }//run


}
