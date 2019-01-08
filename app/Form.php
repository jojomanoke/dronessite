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

    public function foreign_pre_site_survey(){
        return $this->hasOne('App\PreSiteSurvey', 'id', 'pre_site_survey');
    }

    public function foreign_pre_flight_checklist(){
        return $this->hasOne('App\PreFlightChecklist', 'id', 'pre_flight_checklist');
    }

    public function foreign_on_site_survey(){
        return $this->hasOne('App\OnSiteSurvey', 'id', 'on_site_survey');
    }

    public function foreign_maintenance_log(){
        return $this->hasOne('App\MaintenanceLog', 'id', 'maintenance_log');
    }

    public function foreign_incident_log(){
        return $this->hasOne('App\IncidentLog', 'id', 'incident_log');
    }

    public function foreign_embarkation_checklist(){
        return $this->hasOne('App\EmbarkationChecklist', 'id', 'embarkation_checklist');
    }

    public function foreign_aircraft_pilot_and_crew_flight_logs(){
        return $this->hasOne('App\AircraftPilotAndCrewFlightLogs', 'id', 'aircraft_pilot_and_crew_flight_logs');
    }

    public function foreign_arrival_flight_checklist(){
        return $this->hasOne('App\ArrivalFlightChecklist', 'id', 'arrival_flight_checklist');
    }

    public function foreign_post_flight_checklist(){
        return $this->hasOne('App\PostFlightChecklist', 'id', 'post_flight_checklist');
    }

    public function foreign_battery_log(){
        return $this->hasOne('App\BatteryLog', 'id', 'battery_log');
    }
}
