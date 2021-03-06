@extends('layouts.master')

@section('content')
    <h1 class="lead">Embarkation checklist</h1>
    @php if(session()->get('embarkation_checklist') != null){$id = session()->get('embarkation_checklist');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/embarkation_checklist'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/embarkation_checklist', 'files' => true])}}
    @endisset
    @csrf

    @php $parts = array('ground_station_and_leads','camera_monitor_and_leads','av_receiver_and_leads','telemetry_receiver_and_leads','laptop_and_leads','mobile_phone_and_emergency_nos','anemometer','first_aids_kit_and_fire_extinguisher','crew_identification','fluorescent_jackets_hard_hats','two_way_radios','clothing','air_navigation_map','checklists_manuals_and_logbooks','notepad_and_pens','site_assessment_form','sites_safety_tape_cones','flight_battery_packs','transmitter_battery_packs','camera_battery_packs','ground_station_battery','charger_battery_packs','mobile_phone_battery','airframe','camera_mount','flight_controller_transmitters','calibration_platform','cameras_and_lenses','camera_connection_leads','camera_memory_cards','camera_to_airframe_lanyard','camera_attachment_bolt','multi_function_battery_charger','required_charger_leads','battery_checker','screwdrivers','allen_keys','pliers','cable_ties','side_cutters','nylock_propeller_nuts','spare_props','small_socket_set');

$current = 0;
    @endphp

    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        @if($data->$part === 1)
            <div class="form-group">
                {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
                {{Form::checkbox($part, true, ['checked'])}}
            </div>
        @else
            <div class="form-group">
                {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
                {{Form::checkbox($part, true)}}
            </div>
        @endif
        @php $current++; @endphp

    @endwhile
    <div class="pb-5">
        {{Form::submit(__('strings.save'), ['class' => 'btn btn-success float-left'])}}
        {{Form::close()}}

        @isset($id)
            {{Form::open(['url' => 'forms/save/embarkation_checklist'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/embarkation_checklist'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection