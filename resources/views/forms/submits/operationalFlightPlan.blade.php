@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/operational_flight_plan'])}}
    @csrf

    @php $parts = array('operational_flight_plan',
'id',
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
'date_work_required',
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
'50m_horizontal_distance',
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
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        <div class="form-group">
            {{Form::label($current, 'The pilot in command')}}
            {{Form::text('$current', isset($data->$current), ['class' => 'form-control', 'placeholder' => 'Jack Smith'])}}
        </div>
        @php $current++; @endphp

        @endwhile


        {{--<div class="form-group">--}}
            {{--{{Form::label('pilot_in_command', 'The pilot in command')}}--}}
            {{--{{Form::text('pilot_in_command', isset($data->pilot_in_command), ['class' => 'form-control', 'placeholder' => 'Jack Smith'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('obeserver', 'The observer')}}--}}
            {{--{{Form::text('observer', isset($data->observer), ['class' => 'form-control', 'placeholder' => 'John Doe'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('payload_operator', 'Payload operator')}}--}}
            {{--{{Form::text('payload_operator', isset($data->payload_operator), ['class' => 'form-control', 'placeholder' => 'Fred Hinkle'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('helper_1', 'Helper')}}--}}
            {{--{{Form::text('helper', isset($data->helper_1), ['class' => 'form-control', 'placeholder' => 'Marion Allen'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('address', 'Address')}}--}}
            {{--{{Form::text('address', isset($data->address), ['class' => 'form-control', 'placeholder' => 'Gale Simmons'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('latitude_longitude', 'Latitude and longitude')}}--}}
            {{--{{Form::text('latitude_longitude', isset($data->latitude_longitude), ['class' => 'form-control', 'placeholder' => ' 5.921409, 3.398324'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('vehicular_access', 'Vehicular access')}}--}}
            {{--{{Form::text('vehicular_access', isset($data->vehicular_access), ['class' => 'form-control', 'placeholder' => 'yes'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('purpose_of_the_flight', 'Purpose of the flight')}}--}}
            {{--{{Form::text('purpose_of_the_flight', isset($data->purpose_of_the_flight), ['class' => 'form-control', 'placeholder' => 'Reason'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('type_of_operator', 'Type of operator')}}--}}
            {{--{{Form::text('type_of_operator', isset($data->type_of_operator), ['class' => 'form-control', 'placeholder' => ''])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('date_work_required', 'Date work required')}}--}}
            {{--{{Form::text('date_work_required', isset($data->date_work_required), ['class' => 'form-control', 'placeholder' => 'yes'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('mission_duration', 'Mision duration')}}--}}
            {{--{{Form::text('mission_duration', isset($data->mission_duration), ['class' => 'form-control', 'placeholder' => '20'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('cruising_altitude', 'Cruising altitude')}}--}}
            {{--{{Form::text('cruising_altitude', isset($data->cruising_altitude), ['class' => 'form-control', 'placeholder' => '50'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('maximum_altitude', 'Maximum altitude')}}--}}
            {{--{{Form::text('maximum_altitude', isset($data->maximum_altitude), ['class' => 'form-control', 'placeholder' => '75'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('maximum_distance', 'Maximum distance')}}--}}
            {{--{{Form::text('maximum_distance', isset($data->maximum_distance), ['class' => 'form-control', 'placeholder' => '50'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('satellite_picture', 'Satellite picture')}}--}}
            {{--{{Form::file('satellite_picture', null, ['class' => 'form-file'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('bag_viewer_picture', 'Bag viewer picture')}}--}}
            {{--{{Form::file('bag_viewer_picture', null, ['class' => 'form-file'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('position_of_crew', 'Position of crew')}}--}}
            {{--{{Form::text('position_of_crew', isset($data->position_of_crew), ['class' => 'form-control', 'placeholder' => ''])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('flightbox', 'Flightbox')}}--}}
            {{--{{Form::text('flightbox', isset($data->flightbox), ['class' => 'form-control', 'placeholder' => ''])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('alternate_landing_sites', 'Alternate landing site')}}--}}
            {{--{{Form::text('alternate_landing_sites', isset($data->alternate_landing_sites), ['class' => 'form-control', 'placeholder' => ''])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('save_distance', 'Save distance')}}--}}
            {{--{{Form::text('save_distance', isset($data->save_distance), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('local_air_traffic_control', 'Local air traffic control')}}--}}
            {{--{{Form::text('local_air_traffic_control', isset($data->local_air_traffic_control), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('regional_air_traffic_control', 'Regional air traffic control')}}--}}
            {{--{{Form::text('regional_air_traffic_control', isset($data->regional_air_traffic_control), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('military_control', 'Military control')}}--}}
            {{--{{Form::text('military_control', isset($data->military_control), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('low_flying_coordinator', 'Low flying coordinator')}}--}}
            {{--{{Form::text('low_flying_coordinator', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('airspace_level', 'Airspace level')}}--}}
            {{--{{Form::text('airspace_level', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
            {{--{{Form::label('elevation', 'Elevation')}}--}}
            {{--{{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}--}}
        {{--</div>--}}
        {{Form::close()}}

@endsection