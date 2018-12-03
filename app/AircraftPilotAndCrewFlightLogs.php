<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AircraftPilotAndCrewFlightLogs extends Model
{
    public $timestamps = false;
    public $table = 'aircraft_pilot_and_crew_flight_logs';

    public function form(){
        return $this->belongsTo('App\Form', 'aircraft_pilot_and_crew_flight_logs');
    }
}
