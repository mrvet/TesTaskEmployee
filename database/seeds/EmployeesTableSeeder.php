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

        DB::connection()->disableQueryLog();

        factory(Employee::class, 5)->create()->each(function ($u) {

            $u->boss = null;
            $u->position = 2;
            $u->save();

        });

        //$employees = factory(Employee::class, 100)->create();
        $employees = factory(Employee::class, 10000)->create();

        $employees->each(function ($u) use ($employees) {

            $employee = Employee::inRandomOrder()->where('id', '<>' , $u->id)->limit(1)->get()->toArray();

            $employee = $employee[0];
            $u->boss = $employee['id'];
            $u->save();

        });


    }//run


}
