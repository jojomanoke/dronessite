<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidentLog extends Model
{
    public $timestamps = false;
    public $table = 'incident_log';
}
