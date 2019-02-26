<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::enableForeignKeyConstraints();

        Schema::create('employees', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('FirstName');//Имя
            $table->string('SecondName');//Фамилия
            $table->string('LastName');//Отчество

            $table->integer('position')
                  ->nullable($value = true)
                  ->unsigned();//Должность

            $table->timestamps();

            $table->integer('boss')
                  ->nullable($value = true)
                  ->unsigned();//Должность;

            $table->foreign('position')
                ->references('id')
                ->on('positions')
                ->onDelete('set null');

            $table->foreign('boss')
                ->references('id')
                ->on('employees')
                ->onDelete('set null');

        });

    }//up

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
