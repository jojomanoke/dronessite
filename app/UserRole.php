<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $table = 'user_roles';
    public $timestamps = 'false';

    public function user(){
        return $this->hasMany('App\User', 'role_id', 'id');
    }
}
