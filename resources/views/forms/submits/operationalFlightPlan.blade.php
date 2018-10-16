@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/operational_flight_plan', 'files' => true])}}
    @csrf

    @php $parts = array(
'pilot_in_command',
'observer',
'payload_operator',
'helper_1',
'address',
'latitude_longitude',
'elevation',
'vehicular_access',
'purpose_of_the_flight',
'type_of_operator',
'mission_duration',
'cruising_altitude',
'maximum_altitude',
'maximum_distance',
'satellite_picture',
'bag_viewer_picture',
'position_of_crew',
'flightbox',
'alternate_landing_sites',
'save_distance',
'risk_assessment',
'local_air_traffic_control',
'regional_air_traffic_control',
'military_control',
'low_flying_coordinator',
'airspace_level',
'civil_military_ctr',
'atc_required',
'within_3nm_military',
'prohibited_restricted_danger_zone',
'airmen_notice',
'notam_published',
'operation_helpdesk_consulted',
'weather_fvr',
'distance_industrial_ports',
'horizontal_distance',
'class_1_flight',
'tug_received',
'flight_reported',
'terrain',
'other_aircraft',
'hazards',
'restrictions',
'sensitivities',
'permission',
'weather');

$current = 0;
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::text($part, isset($data->$part), ['class' => 'form-control'])}}
        </div>
        @php $current++; @endphp

    @endwhile

    <div class="form-group">
        {{Form::label('date_work_required', 'Date required work')}}
        {{Form::date('date_work_required', old('', \Carbon\Carbon::parse($data->date_work_required)->format('d/m/Y')), ['class' => 'form-date'])}}
    </div>

    <div class="form-group">
        {{Form::label('satellite_picture', 'Satellite picture')}}
        {{Form::file('satellite_picture', null, ['class' => 'form-file'])}}
    </div>


    {{Form::submit('Save', ['class' => 'btn btn-success'])}}
    {{Form::close()}}

@endsection