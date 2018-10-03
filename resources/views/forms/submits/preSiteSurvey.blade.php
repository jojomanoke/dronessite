@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/pre_flight_survey'])}}
    @csrf

    @php $parts = array(
'pilot_in_command',
'uav_registration',
'helper_1',
'helper_2',
'latitude_longitude',
'altitude_from_sea_level',
'work_required',
'date_work_require',
'downloaded_map_to_groundstation',
'vehicular_access',
'airspace_type',
'terrain_type',
'proximities',
'hazards',
'restrictions',
'sensitivities',
'people',
'livestock',
'permission',
'access',
'footpaths',
'alternate',
'risk_reduction',
'weather',
'notams',
'local_air_traffic_control',
'regional_air_traffic_control',
'military_control',
'notice_to_airmen',
 );

$current = 0;
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::checkbox($part, $part)}}
        </div>
        @php $current++; @endphp

        @endwhile



        {{Form::close()}}

@endsection