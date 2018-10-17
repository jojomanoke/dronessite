<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationalFlightPlan extends Model
{
    public $timestamps = false;
    public $table = 'operational_flight_plan';

    public function form(){
        return $this->belongsTo('App\Form', 'operational_flight_plan');
    }
}
