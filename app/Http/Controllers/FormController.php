<?php

namespace App\Http\Controllers;

use App\EmbarkationChecklist;
use App\Form;
use App\IncidentLog;
use App\MaintenanceLog;
use App\OnSiteSurvey;
use App\OperationalFlightPlan;
use App\PreFlightChecklist;
use App\PreSiteSurvey;
use Carbon\Carbon;
use DemeterChain\Main;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;
use PHPUnit\Util\Blacklist;

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
            $form = Form::find(session()->get('isSubmitting'));
        }
//        return json_encode($form);
        return view('forms.submitOverview', ['form' => $form]);
    }

    public function operational_flight_plan_edit()
    {
        if(session()->get('operational_flight_plan') != null){
            $id = session()->get('operational_flight_plan');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = OperationalFlightPlan::all()->where('id',$id);
        }
        else{
            $data = new OperationalFlightPlan();
        }
//        return json_encode($data);

        return view('forms.submits.operationalFlightPlan', ['data' => $data]);
    }

    public function operational_flight_plan_save(Request $r, $id = null)
    {
        if ($id != null) {
            $data = OperationalFlightPlan::find($id);
        } else {
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
        $data->date_work_required = Carbon::parse($r->input('date_work_required'));

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
        $data->sensitivities = $r->input('sensitivities');
        $data->permission = $r->input('permission');
        $data->weather = $r->input('weather');

        if ($r->file('satellite_picture' != null)){
            $data->satellite_picture = $r->file('satellite_picture');
            $filename = Auth::user()->student_number . '.' . $data->satellite_picture->getClientOriginalName();
            Image::make($r->file('satellite_picture'))->save(storage_path() . '/app/public/' . $filename);
        }
        $data->bag_viewer_picture = $r->input('bag_viewer_picture');
        $data->position_of_crew = $r->input('position_of_crew');
        $data->flightbox = $r->input('flightbox');
        $data->alternate_landing_sites = $r->input('alternate_landing_sites');
        $data->save();

        if(session()->get('operational_flight_plan') === null){
            session()->put('operational_flight_plan', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::get('id', session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->operational_flight_plan = $data->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }

        return redirect(url('forms/submit/progress'));
    }

    public function pre_site_survey()
    {
        if(session()->get('pre_site_survey') != null){
            $id = session()->get('pre_site_survey');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = PreSiteSurvey::find($id);
        }
        else{
            $data = new OperationalFlightPlan();
        }
//        echo("<pre>".var_dump($data)."</pre>");
        return view('forms.submits.preSiteSurvey', ['data' => $data]);
    }

    public function pre_site_survey_save(Request $r, $id = null)
    {

        if($id != null){
            $data = PreSiteSurvey::find($id);
        }
        else{
            $data = new PreSiteSurvey();
        }

        $data->pilot_in_command = $r->input('pilot_in_command');
        $data->observer = $r->input('observer');
        $data->uav_registration = $r->input('uav_registration');
        $data->helper_1 = $r->input('helper_1');
        $data->helper_2 = $r->input('helper_2');
        $data->latitude_longitude = $r->input('latitude_longitude');
        $data->altitude_from_sea_level = $r->input('altitude_from_sea_level');
        $data->work_required = $r->input('work_required');
        $data->date_work_required = $r->input('date_work_required');
        $data->downloaded_map_to_groundstation = $r->input('downloaded_map_to_groundstation');
        $data->vehicular_access = $r->input('vehicular_access');
        $data->airspace_type = $r->input('airspace_type');
        $data->terrain_type = $r->input('terrain_type');
        $data->proximities = $r->input('proximities');
        $data->hazards = $r->input('hazards');
        $data->restrictions = $r->input('restrictions');
        $data->sensitivities = $r->input('sensitivities');
        $data->people = $r->input('people');
        $data->livestock = $r->input('livestock');
        $data->permission = $r->input('permission');
        $data->access = $r->input('access');
        $data->footpaths = $r->input('footpaths');
        $data->alternate = $r->input('alternate');
        $data->risk_reduction = $r->input('risk_reduction');
        $data->weather = $r->input('weather');
        $data->notams = $r->input('notams');
        $data->local_air_traffic_control = $r->input('local_air_traffic_control');
        $data->regional_air_traffic_control = $r->input('regional_air_traffic_control');
        $data->military_control = $r->input('military_control');
        $data->notice_to_airmen = $r->input('notice_to_airmen');

        $data->save();
        if(session()->get('pre_site_survey') === null){
            session()->put('pre_site_survey', $data->id);
        }

        return redirect(url('forms/submit/progress'));
    }
    public function pre_flight_checklist()
    {
        if(session()->get('pre_flight_checklist') != null){
            $id = session()->get('pre_flight_checklist');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = PreFlightChecklist::find($id);
        }
        else{
            $data = new PreFlightChecklist();
        }

        return view('forms.submits.preFlightChecklist')->with('data', $data);
    }

    public function pre_flight_checklist_save(Request $r, $id = null)
    {
        if($id != null){
            $data = PreFlightChecklist::find($id);
        }
        else{
            $data = new PreFlightChecklist();
        }

        $data->airframe = $r->input('airframe');
        $data->flight_battery = $r->input('flight_battery');
        $data->transmitters = $r->input('transmitters');
        $data->camera = $r->input('camera');
        $data->airframe_calibration = $r->input('airframe_calibration');
        $data->flight_battery_props = $r->input('flight_battery_props');
        $data->self_diagnostic = $r->input('self_diagnostic');
        $data->monitor = $r->input('monitor');
        $data->calibration = $r->input('calibration');
        $data->save_calibration = $r->input('save_calibration');
        $data->camera_platform = $r->input('camera_platform');
        $data->telemetry_link = $r->input('telemetry_link');
        $data->flight_plan = $r->input('flight_plan');
        $data->camera_recording = $r->input('camera_recording');
        $data->aircraft_alignment = $r->input('aircraft_alignment');
        $data->crew_public_client = $r->input('crew_public_client');
        $data->clearance = $r->input('clearance');
        $data->power_up = $r->input('power_up');
        $data->take_off = $r->input('take_off');
        $data->communication = $r->input('communication');
        $data->landing = $r->input('landing');

        $data->save();

        if(session()->get('pre_flight_checklist') === null){
            session()->put('pre_flight_checklist', $data->id);
        }

        return redirect(url('forms/submit/progress'));

    }

    public function on_site_survey()
    {
        if(session()->get('pre_flight_checklist') != null){
            $id = session()->get('pre_flight_checklist');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = OnSiteSurvey::find($id);
        }
        else{
            $data = new OnSiteSurvey();
        }

        return view('forms.submits.onSiteSurvey')->with('data', $data);
    }

    public function on_site_survey_save(Request $r, $id = null)
    {
        if($id != null){
            $data = OnSiteSurvey::find($id);
        }
        else{
            $data = new OnSiteSurvey();
        }

        $data->pilot_in_command = $r->input('pilot_in_command');
        $data->observer = $r->input('observer');
        $data->obstructions = $r->input('obstructions');
        $data->view_limitations = $r->input('view_limitations');
        $data->people = $r->input('people');
        $data->livestock = $r->input('livestock');
        $data->temperature = $r->input('temperature');
        $data->visibility = $r->input('visibility');
        $data->surface = $r->input('surface');
        $data->permission = $r->input('permission');
        $data->public = $r->input('public');
        $data->air_traffic = $r->input('air_traffic');
        $data->communication = $r->input('communication');
        $data->proximity = $r->input('proximity');
        $data->take_off_area = $r->input('take_off_area');
        $data->landing_area = $r->input('landing_area');
        $data->operational_zone = $r->input('operational_zone');
        $data->emergency_area = $r->input('emergency_area');
        $data->holding_area = $r->input('holding_area');

        $data->save();

        if(session()->get('on_site_survey') === null){
            session()->put('on_site_survey', $data->id);
        }

        return redirect(url('forms/submit/progress'));
    }

    public function maintenance_log()
    {
        if(session()->get('maintenance_log') != null){
            $id = session()->get('maintenance_log');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = MaintenanceLog()::find($id);
        }
        else{
            $data = new MaintenanceLog();
        }

        return view('forms.submits.maintenanceLog')->with('data', $data);
    }

    public function maintenance_log_save(Request $r, $id = null)
    {
        if($id != null){
            $data = MaintenanceLog::find($id);
        }
        else{
            $data = new MaintenanceLog();
        }

        $data->date = Carbon::create($r->input('date'));
        $data->reason = $r->input('reason');
        $data->work_done = $r->input('work_done');
        $data->parts_replaced = $r->input('parts_replaced');
        $data->system_tested = $r->input('system_tested');
        $data->notes = $r->input('notes');

        $data->save();

        if(session()->get('maintenance_log') === null){
            session()->put('maintenance_log', $data->id);
        }

        return redirect(url('forms/submit/progress'));
    }

    public function incident_log()
    {
        if(session()->get('incident_log') != null){
            $id = session()->get('incident_log');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = IncidentLog::find($id);
        }
        else{
            $data = new IncidentLog();
        }

        return view('forms.submits.incidentLog')->with('data', $data);
    }

    public function incident_log_save(Request $r, $id = null)
    {
        if($id != null){
            $data = IncidentLog::find($id);
        }
        else{
            $data = new IncidentLog();
        }

        $data->date_of_incident = Carbon::create($r->input('date_of_incident'));
        $data->time_of_incident = Carbon::create($r->input('time_of_incident'));
        $data->damage = $r->input('damage');
        $data->incident_details = $r->input('incident_details');
        $data->action_taken = $r->input('action_taken');
        $data->notes = $r->input('notes');

        $data->save();

        if(session()->get('incident_log') === null){
            session()->put('incident_log', $data->id);
        }

        return redirect(url('forms/submit/progress'));
    }
    public function embarkation_checklist()
    {
        if(session()->get('embarkation_checklist') != null){
            $id = session()->get('embarkation_checklist');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = EmbarkationChecklist::find($id);
        }
        else{
            $data = new EmbarkationChecklist();
        }

        return view('forms.submits.embarkationChecklist')->with('data', $data);
    }

    public function embarkation_checklist_save(Request $r, $id = null)
    {
        if($id != null){
            $data = EmbarkationChecklist::find($id);
        }
        else{
            $data = new EmbarkationChecklist();
        }

        $data->ground_station_and_leads = $r->input('ground_station_and_leads');
        $data->camera_monitor_and_leads = $r->input('camera_monitor_and_leads');
        $data->av_receiver_and_leads = $r->input('av_receiver_and_leads');
        $data->telemetry_receiver_and_leads = $r->input('telemetry_receiver_and_leads');
        $data->laptop_and_leads = $r->input('laptop_and_leads');
        $data->mobile_phone_and_emergency_nos = $r->input('mobile_phone_and_emergency_nos');
        $data->anemometer = $r->input('anemometer');
        $data->first_aids_kit_and_fire_extinguisher = $r->input('first_aids_kit_and_fire_extinguisher');
        $data->crew_identification = $r->input('crew_identification');
        $data->fluorescent_jackets_hard_hats = $r->input('fluorescent_jackets_hard_hats');
        $data->two_way_radios = $r->input('two_way_radios');
        $data->clothing = $r->input('clothing');
        $data->air_navigation_map = $r->input('air_navigation_map');
        $data->checklists_manuals_and_logbooks = $r->input('checklists_manuals_and_logbooks');
        $data->notepad_and_pens = $r->input('notepad_and_pens');
        $data->site_assessment_form = $r->input('site_assessment_form');
        $data->sites_safety_tape_cones = $r->input('sites_safety_tape_cones');
        $data->flight_battery_packs = $r->input('flight_battery_packs');
        $data->transmitter_battery_packs = $r->input('transmitter_battery_packs');
        $data->camera_battery_packs = $r->input('camera_battery_packs');
        $data->ground_station_battery = $r->input('ground_station_battery');
        $data->charger_battery_packs = $r->input('charger_battery_packs');
        $data->mobile_phone_battery = $r->input('mobile_phone_battery');
        $data->airframe = $r->input('airframe');
        $data->camera_mount = $r->input('camera_mount');
        $data->flight_controller_transmitters = $r->input('flight_controller_transmitters');
        $data->calibration_platform = $r->input('calibration_platform');
        $data->cameras_and_lenses = $r->input('cameras_and_lenses');
        $data->camera_connection_leads = $r->input('camera_connection_leads');
        $data->camera_memory_cards = $r->input('camera_memory_cards');
        $data->camera_to_airframe_lanyard = $r->input('camera_to_airframe_lanyard');
        $data->camera_attachment_bolt = $r->input('camera_attachment_bolt');
        $data->multi_function_battery_charger = $r->input('multi_function_battery_charger');
        $data->required_charger_leads = $r->input('required_charger_leads');
        $data->battery_checker = $r->input('battery_checker');
        $data->screwdrivers = $r->input('screwdrivers');
        $data->allen_keys = $r->input('allen_keys');
        $data->pliers = $r->input('pliers');
        $data->cable_ties = $r->input('cable_ties');
        $data->side_cutters = $r->input('side_cutters');
        $data->nylock_propeller_nuts = $r->input('nylock_propeller_nuts');
        $data->spare_props = $r->input('spare_props');
        $data->small_socket_set = $r->input('small_socket_set');

        $data->save();

        if(session()->get('embarkation_checklist') === null){
            session()->put('embarkation_checklist', $data->id);
        }

        return redirect(url('forms/submit/progress'));
    }

    public function aircraft_pilot_and_crew_flight_logs()
    {
        if(session()->get('aircraft_pilot_and_crew_flight_logs') != null){
            $id = session()->get('aircraft_pilot_and_crew_flight_logs');
        }
        else{
            $id = null;
        }
        if($id != null){
//            $data = ::find($id);
        }
        else{
//            $data = new ();
        }

        return view('forms.submits.preFlightChecklist')->with('data', $data);
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
