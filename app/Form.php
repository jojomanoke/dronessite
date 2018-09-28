<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $table = 'submitted_forms';

    public function user(){
        return $this->hasOne('App\User', 'id', 'foreign_id');
    }
}
