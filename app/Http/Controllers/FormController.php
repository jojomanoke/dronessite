<?php

namespace App\Http\Controllers;

use App\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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

    public function operational_flight_plan_edit()
    {


        return view('forms.submits.operationalFlightPlan');
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
