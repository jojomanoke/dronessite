<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArrivalFlightChecklist extends Model
{
    public $timestamps = false;
    public $table = 'arrival_flight_checklist';

    public function form(){
        return $this->belongsTo('App\Form', 'arrival_flight_checklist');
    }
}
