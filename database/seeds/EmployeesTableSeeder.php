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

            //$employee = Employee::first();
            $u->boss = null;
            $u->save();

        });

        $employees = Employee::all()
            ->where('boss','=' , null);

        $count = $employees->count();

        factory(Employee::class, 1000)->create()->each(function ($u) use ($employees , $count) {

            $randPositionNumber = rand(0,$count-1);

            $u->boss = $employees[$randPositionNumber]->id;

            $u->save();

        });

    }


}
