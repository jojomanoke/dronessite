<?php

namespace App\Http\Controllers;

use App\AircraftPilotAndCrewFlightLogs;
use App\ArrivalFlightChecklist;
use App\BatteryLog;
use App\EmbarkationChecklist;
use App\Form;
use App\IncidentLog;
use App\MaintenanceLog;
use App\Message;
use App\OnSiteSurvey;
use App\OperationalFlightPlan;
use App\PostFlightChecklist;
use App\PreFlightChecklist;
use App\PreSiteSurvey;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Auth;

class FormController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id === 1){
            $forms = Form::where('user_id', Auth::user()->id)->get();
        }
        else{
            $forms = Form::all();
        }

        $user = Auth::user();
//        return json_encode($user);
        return view('forms.overview')->with(['user' => $user, 'forms' => $forms]);
    }

    public function submitOverview(Request $request, $id = null)
    {
        $check_array[] = null;
        if(null != $id) {
            $current = 0;
            $request->session()->put('isSubmitting', $id);
            $form = Form::find(session()->get('isSubmitting'));
            foreach($form->getAttributes() as $attr => $value){
                if($current > 1 && $current < 13){
                    $check_array[$attr] = $value;
                }
                $current ++;
            }
            array_pull($check_array, 0);

            foreach($check_array as $key => $value){
                $request->session()->put($key, $value);
            }
        }
        if(null != $request->session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
        }

        $user = \Auth::user();
        if($id != null){
            return redirect('/forms/submit/progress');
        }
        else {
            return view('forms.submitOverview', ['form' => $form, 'user' => $user]);
        }
    }

    public function resetSubmit(Request $r){
        $check_array[] = null;
        $current = 0;
        $form = Form::all()->first();
        $r->session()->put('isSubmitting', null);
        if($form != null){
            foreach($form->getAttributes() as $attr => $value){
                if($current > 1 && $current < 13){
                    $r->session()->put($attr, null);
                }
                $current ++;
            }
        }

        array_pull($check_array, 0);
        return redirect('/forms/submit/progress');
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
            $data = OperationalFlightPlan::all()->where('id', $id)->first();
        }
        else{
            $data = new OperationalFlightPlan();
        }
//        return json_encode($data);

        return view('forms.submits.operationalFlightPlan', ['data' => $data]);
    }

    public function operational_flight_plan_save(Request $r, $id = null, $final = null)
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
        $data->maximum_altitude = $r->input('maximum_altitude');
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
//        return json_encode($data);
        if ($r->file('satellite_picture' != null)){
            $filename = Auth::user()->student_number . '.' . $r->file('satellite_picture')->getClientOriginalName();
            $data->satellite_picture = $filename;
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
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->operational_flight_plan = $data->id;
        $form->save();

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

    public function pre_site_survey_save(Request $r, $id = null, $final = null)
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

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->pre_site_survey = $data->id;
        $form->save();

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

//        return json_encode($data);
        return view('forms.submits.preFlightChecklist')->with('data', $data);
    }

    public function pre_flight_checklist_save(Request $r, $id = null, $final = null)
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

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->pre_flight_checklist = $data->id;
        $form->save();

        return redirect(url('forms/submit/progress'));

    }

    public function on_site_survey()
    {
        if(session()->get('on_site_survey') != null){
            $id = session()->get('on_site_survey');
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

    public function on_site_survey_save(Request $r, $id = null, $final = null)
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

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->on_site_survey = $data->id;
        $form->save();

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
            $data = MaintenanceLog::find($id);
        }
        else{
            $data = new MaintenanceLog();
        }

        return view('forms.submits.maintenanceLog')->with('data', $data);
    }

    public function maintenance_log_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = MaintenanceLog::find($id);
        }
        else{
            $data = new MaintenanceLog();
        }

        $data->date = Carbon::parse($r->input('date'));
        $data->reason = $r->input('reason');
        $data->work_done = $r->input('work_done');
        $data->parts_replaced = $r->input('parts_replaced');
        $data->system_tested = $r->input('system_tested');
        $data->notes = $r->input('notes');

        $data->save();

        if(session()->get('maintenance_log') === null){
            session()->put('maintenance_log', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->maintenance_log = $data->id;
        $form->save();

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

    public function incident_log_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = IncidentLog::find($id);
        }
        else{
            $data = new IncidentLog();
        }

        $data->date_of_incident = Carbon::parse($r->input('date_of_incident'));
        $data->time_of_incident = Carbon::parse($r->input('time_of_incident'));
        $data->damage = $r->input('damage');
        $data->incident_details = $r->input('incident_details');
        $data->action_taken = $r->input('action_taken');
        $data->notes = $r->input('notes');

        $data->save();

        if(session()->get('incident_log') === null){
            session()->put('incident_log', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->incident_log = $data->id;
        $form->save();

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

    public function embarkation_checklist_save(Request $r, $id = null, $final = null)
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

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->embarkation_checklist = $data->id;
        $form->save();

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
            $data = AircraftPilotAndCrewFlightLogs::find($id);
        }
        else{
            $data = new AircraftPilotAndCrewFlightLogs();
        }

        return view('forms.submits.aircraftPilotAndCrewFlightLogs')->with('data', $data);
    }

    public function aircraft_pilot_and_crew_flight_logs_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = AircraftPilotAndCrewFlightLogs::find($id);
        }
        else{
            $data = new AircraftPilotAndCrewFlightLogs();
        }
        $data->date = Carbon::parse($r->input('date'));
        $data->take_off_time = Carbon::parse($r->input('take_off_time'));
        $data->landing_time = Carbon::parse($r->input('landing_time'));
        $data->duration = $r->input('duration');
        $data->aircraft = $r->input('aircraft');
        $data->aircraft_system = $r->input('aircraft_system');
        $data->engine_battery_no = $r->input('engine_battery_no');
        $data->pilot_in_command = $r->input('pilot_in_command');
        $data->observer = $r->input('observer');
        $data->payload_operator = $r->input('payload_operator');
        $data->location = $r->input('location');
        $data->purpose_of_flight = $r->input('purpose_of_flight');
        $data->comments = $r->input('comments');

        $data->save();

        if(session()->get('aircraft_pilot_and_crew_flight_logs') === null){
            session()->put('aircraft_pilot_and_crew_flight_logs', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->aircraft_pilot_and_crew_flight_logs = $data->id;
        $form->save();

        return redirect(url('forms/submit/progress'));
    }

    public function arrival_flight_checklist()
    {
        if(session()->get('arrival_flight_checklist') != null){
            $id = session()->get('arrival_flight_checklist');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = ArrivalFlightChecklist::find($id);
        }
        else{
            $data = new ArrivalFlightChecklist();
        }

        return view('forms.submits.arrivalFlightChecklist')->with('data', $data);
    }

    public function arrival_flight_checklist_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = ArrivalFlightChecklist::find($id);
        }
        else{
            $data = new ArrivalFlightChecklist();
        }
        $data->site_survey = $r->input('site_survey');
        $data->flight_plan = $r->input('flight_plan');
        $data->airframe = $r->input('airframe');
        $data->camera = $r->input('camera');
        $data->av_connections = $r->input('av_connections');
        $data->propellors = $r->input('propellors');
        $data->calibration_platform = $r->input('calibration_platform');
        $data->ground_station = $r->input('ground_station');
        $data->av_monitor = $r->input('av_monitor');
        $data->crew_identification_badges = $r->input('crew_identification_badges');
        $data->hard_hat_fluorescent_jackets = $r->input('hard_hat_fluorescent_jackets');
        $data->two_way_radios = $r->input('two_way_radios');
        $data->first_aid_kit = $r->input('first_aid_kit');
        $data->fire_extinguisher = $r->input('fire_extinguisher');
        $data->cordens_signs_and_safety_tape = $r->input('cordens_signs_and_safety_tape');

        $data->save();

        if(session()->get('arrival_flight_checklist') === null){
            session()->put('arrival_flight_checklist', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->arrival_flight_checklist = $data->id;
        $form->save();

        return redirect(url('forms/submit/progress'));
    }

    public function post_flight_checklist()
    {
        if(session()->get('post_flight_checklist') != null){
            $id = session()->get('post_flight_checklist');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = PostFlightChecklist::find($id);
        }
        else{
            $data = new PostFlightChecklist();
        }

        return view('forms.submits.postFlightChecklist')->with('data', $data);
    }

    public function post_flight_checklist_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = PostFlightChecklist::find($id);
        }
        else{
            $data = new PostFlightChecklist();
        }
        $data->touchdown = $r->input('touchdown');
        $data->power_down = $r->input('power_down');
        $data->removal = $r->input('removal');
        $data->data_recording = $r->input('data_recording');
        $data->transmitter = $r->input('transmitter');
        $data->camera = $r->input('camera');
        $data->airframe = $r->input('airframe');
        $data->battery = $r->input('battery');
        $data->memory_card = $r->input('memory_card');
        $data->review = $r->input('review');

        $data->save();

        if(session()->get('post_flight_checklist') === null){
            session()->put('post_flight_checklist', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->post_flight_checklist = $data->id;
        $form->save();

        return redirect(url('forms/submit/progress'));
    }

    public function battery_log()
    {
        if(session()->get('battery_log') != null){
            $id = session()->get('battery_log');
        }
        else{
            $id = null;
        }
        if($id != null){
            $data = BatteryLog::find($id);
        }
        else{
            $data = new BatteryLog();
        }

        return view('forms.submits.batteryLog')->with('data', $data);
    }

    public function battery_log_save(Request $r, $id = null, $final = null)
    {
        if($id != null){
            $data = BatteryLog::find($id);
        }
        else{
            $data = new BatteryLog();
        }
        $data->battery_number = $r->input('battery_number');
        $data->battery_residual = $r->input('battery_residual');
        $data->date_of_charge = Carbon::parse($r->input('date_of_charge'));
        $data->charge_input = $r->input('charge_input');
        $data->flight_duration = $r->input('flight_duration');
        $data->pre_flight = $r->input('pre_flight');
        $data->notes = $r->input('notes');

        $data->save();

        if(session()->get('battery_log') === null){
            session()->put('battery_log', $data->id);
        }

        if(null != session()->get('isSubmitting')){
            $form = Form::find(session()->get('isSubmitting'));
        }
        else{
            $form = new Form();
            $form->user_id = Auth::user()->id;
            $form->save();
            session()->put('isSubmitting', $form->id);
        }
        $form->user_id = Auth::user()->id;
        $form->battery_log = $data->id;
        $form->save();

        return redirect(url('forms/submit/progress'));
    }

    public function contact(){
        $data = null;



        return view('contact')->with('data', $data);
    }

    public function delete($id, Request $r){

        $form = Form::all()->where('id', $id)->first();
        $form->delete();
        return json_encode($form);

//        return redirect()->back();
    }

    public function contactSubmit(){
        


    return redirect(url('home'));
    }








}