<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model{


    /**
     * Связанная с моделью таблица.
     *
     * @var string
     */
    protected $table = 'positions';

    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = false;



}
