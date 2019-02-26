<?php

use App\Models\Position;
use App\Models\Employee;
use Faker\Generator;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Employee::class, function (Generator $faker) {

    static $password;

    $fullname = $faker->name;

    $randPositionNumber = rand(0,4);

    $positions = Position::all(  );

    $parts = explode(' ',$fullname );

    return [
        'FirstName' => $parts[0],
        'SecondName' => $parts[1],
        'LastName' => isset($parts[2]) ? $parts[2] : '',
        'position' => $positions[$randPositionNumber]->id,
    ];
});
