<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public $table = 'submitted_forms';

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
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
        return $this->hasOne('App\OnSiteSurvey', 'id', 'on_site_survey');
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

    public function aircraft_pilot_and_crew_flight_logs(){
        return $this->hasOne('App\AircraftPilotAndCrewFlightLogs', 'id', 'aircraft_pilot_and_crew_flight_logs');
    }

    public function arrival_flight_checklist(){
        return $this->hasOne('App\ArrivalFlightChecklist', 'id', 'arrival_flight_checklist');
    }

    public function post_flight_checklist(){
        return $this->hasOne('App\PostFlightChecklist', 'id', 'post_flight_checklist');
    }

    public function battery_log(){
        return $this->hasOne('App\BatteryLog', 'id', 'battery_log');
    }
}
