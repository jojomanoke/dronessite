<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreSiteSurvey extends Model
{
    public $table = 'pre_site_survey';
    public $timestamps = false;

    public function form(){
        return $this->belongsTo('App\Form', 'pre_site_survey');
    }
}
