<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatteryLog extends Model
{
    public $timestamps = false;
    public $table = 'battery_log';

    public function form(){
        return $this->belongsTo('App\Form', 'battery_log');
    }
}
