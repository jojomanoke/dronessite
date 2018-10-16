<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $table = 'submitted_forms';

    public function user(){
        return $this->hasOne('App\User', 'id', 'foreign_id');
    }

    public function operational_flight_plan(){
        return $this->hasOne('App\OperationalFlightPlan', 'id', 'operational_flight_plan');
    }

    public function pre_site_survey(){
        return $this->hasOne('App\PreSiteSurvey', 'id', 'pre_site_survey');
    }

    public function pre_flight_checklist(){
        return $this->hasOne('App\PreFlightChecklist', 'id', 'pre_flight_checklist');
    }

    public function on_site_survey(){
        return $this->hasOne('App\PreSiteSurvey', 'id', 'on_site_survey');
    }

    public function maintenance_log(){
        return $this->hasOne('App\MaintenanceLog', 'id', 'maintenance_log');
    }

    public function incident_log(){
        return $this->hasOne('App\IncidentLog', 'id', 'incident_log');
    }

    public function embarkation_checklist(){
        return $this->hasOne('App\EmbarkationChecklist', 'id', 'embarkation_checklist');
    }
}
