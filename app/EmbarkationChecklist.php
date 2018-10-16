<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmbarkationChecklist extends Model
{
    public $timestamps = false;
    public $table = 'embarkation_checklist';

    public function form(){
        return $this->belongsTo('App\Form', 'embarkation_checklist');
    }
}
