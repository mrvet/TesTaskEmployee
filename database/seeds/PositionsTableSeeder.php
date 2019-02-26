<?php

use Illuminate\Database\Seeder;

use App\Models\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $position = new Position();
        $position->PositionTitle = 'Генеральный директор';

        $position->save();

        $position = new Position();
        $position->PositionTitle = 'Директор';
        $position->save();

        $position = new Position();
        $position->PositionTitle = 'Программист';
        $position->save();

        $position = new Position();
        $position->PositionTitle = 'Тестировщик';
        $position->save();

        $position = new Position();
        $position->PositionTitle = 'Уборщик';
        $position->save();

        //
    }
}
