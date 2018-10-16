<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentLog extends Model
{
    public $timestamps = false;
    public $table = 'incident_log';

    public function form(){
        return $this->belongsTo('App\Form', 'incident_log');
    }
}
