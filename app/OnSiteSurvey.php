<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OnSiteSurvey extends Model
{
    public $timestamps = false;
    public $table = 'on_site_survey';

    public function form(){
        return $this->belongsTo('App\Form', 'on_site_survey');
    }
}
