<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFlightChecklist extends Model
{
    public $timestamps = false;
    public $table = 'post_flight_checklist';

    public function form(){
        return $this->belongsTo('App\Form', 'post_flight_checklist');
    }
}
