<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model{

    protected $table = 'employees';

    public function position(  ){

        return $this->belongsTo(
            'App\Models\Position',
            'position',
            'id'
        );

    }//position


    public function boss(  ){

        return $this->belongsTo(
            'App\Models\Employee',
            'boss',
            'id'
        );

    }//position

}
