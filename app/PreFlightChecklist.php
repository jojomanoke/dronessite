<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreFlightChecklist extends Model
{
    public $table = 'pre_flight_checklist';
    public $timestamps = false;

    public function form(){
        return $this->belongsTo('App\Form', 'pre_flight_checklist');
    }
}
