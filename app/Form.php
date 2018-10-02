<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $table = 'submitted_forms';

    public function user(){
        return $this->hasOne('App\User', 'id', 'foreign_id');
    }

    public function operational_flight_plan(){
        return $this->hasOne('App\OperationalFlightPlan', 'id', 'operational_flight_plan');
    }
}
