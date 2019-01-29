<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model
{
    public $timestamps = false;
    public $table = 'maintenance_log';
}
