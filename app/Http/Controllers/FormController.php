<?php

namespace App\Http\Controllers;

use App\Form;
use App\OperationalFlightPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class FormController extends Controller
{
    public function index()
    {
        $forms = Form::all();
        return view('forms.overview');
    }

    public function submitOverview(Request $request)
    {
        if(null != $request->session()->get('isSubmitting')){
            $form = Form::get('id', $request->session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
        }

        return view('forms.submitOverview', ['form' => $form]);
    }

    public function operational_flight_plan_edit($id = null)
    {
        if($id != null){
            $data = OperationalFlightPlan::all()->where('id', $id);
        }
        else{
            $data = new OperationalFlightPlan();
        }

        return view('forms.submits.operationalFlightPlan', ['data' => $data]);
    }

    public function operational_flight_plan_save(Request $r, $id = null)
    {
        if($id != null){
            $data = OperationalFlightPlan::all()->where('id', $id);
        }
        else{
            $data = new OperationalFlightPlan();
        }

        $data->pilot_in_command = $r->input('pilot_in_command');
        $data->observer = $r->input('observer');
        $data->payload_operator = $r->input('payload_operator');
        $data->helper_1 = $r->input('helper_1');
        $data->address = $r->input('address');
        $data->latitude_longitude = $r->input('latitude_longitude');
        $data->elevation = $r->input('elevation');
        $data->vehicular_access = $r->input('vehicular_access');
        $data->purpose_of_the_flight = $r->input('purpose_of_the_flight');
        $data->type_of_operator = $r->input('type_of_operator');
        $data->date_work_required = $r->input('date_work_required');
        $data->mission_duration = $r->input('mission_duration');
        $data->cruising_altitude = $r->input('cruising_altitude');
        $data->cruising_altitude = $r->input('cruising_altitude');
        $data->maximum_distance = $r->input('maximum_distance');
        $data->save_distance = $r->input('save_distance');
        $data->risk_assessment = $r->input('risk_assessment');
        $data->local_air_traffic_control = $r->input('local_air_traffic_control');
        $data->regional_air_traffic_control = $r->input('regional_air_traffic_control');
        $data->military_control = $r->input('military_control');
        $data->low_flying_coordinator = $r->input('low_flying_coordinator');
        $data->airspace_level = $r->input('airspace_level');
        $data->civil_military_ctr = $r->input('civil_military_ctr');
        $data->atc_required = $r->input('atc_required');
        $data->within_3nm_military = $r->input('within_3nm_military');
        $data->prohibited_restricted_danger_zone = $r->input('prohibited_restricted_danger_zone');
        $data->airmen_notice = $r->input('airmen_notice');
        $data->notam_published = $r->input('notam_published');
        $data->operation_helpdesk_consulted = $r->input('operation_helpdesk_consulted');
        $data->weather_fvr = $r->input('weather_fvr');
        $data->distance_industrial_ports = $r->input('distance_industrial_ports');
        $data->horizontal_distance = $r->input('horizontal_distance');
        $data->class_1_flight = $r->input('class_1_flight');
        $data->tug_received = $r->input('tug_received');
        $data->flight_reported = $r->input('flight_reported');
        $data->terrain = $r->input('terrain');
        $data->other_aircraft = $r->input('other_aircraft');
        $data->hazards = $r->input('hazards');
        $data->restrictions = $r->input('restrictions');
        $data->sensitivities =$r->input('sensitivities');
        $data->permission = $r->input('permission');
        $data->weather = $r->input('weather');

        $data->satellite_picture = $r->file('satellite_picture');
        $filename = Auth::user()->student_number . '.' . $data->satellite_picture->getClientOriginalName();

        Image::make($r->file('satellite_picture'))->save(storage_path().'/app/public/'.$filename);


        $data->bag_viewer_picture = $r->input('bag_viewer_picture');
        $data->position_of_crew = $r->input('position_of_crew');
        $data->flightbox = $r->input('flightbox');
        $data->alternate_landing_sites = $r->input('alternate_landing_sites');
    }

    public function pre_site_survey()
    {


        return view('forms.submits.preSiteSurvey');
    }
    public function pre_flight_checklist()
    {


        return view('forms.submits.preFlightChecklist');
    }
    public function on_site_surveys()
    {


        return view('forms.submits.onSiteSurvey');
    }
    public function maintenance_log()
    {


        return view('forms.submits.maintenanceLog');
    }
    public function incident_log()
    {


        return view('forms.submits.incidentLog');
    }
    public function embarkation_checklist()
    {


        return view('forms.submits.embarkationChecklist');
    }
    public function aircraft_pilot_and_crew_flight_logs()
    {


        return view('forms.submits.aircraftPilotAndCrewFlightLogs');
    }
    public function arrival_flight_checklist()
    {


        return view('forms.submits.arrivalFlightChecklist');
    }
    public function post_flight_checklist()
    {


        return view('forms.submits.postFlightChecklist');
    }
    public function battery_log()
    {


        return view('forms.submits.batteryLog');
    }

}
