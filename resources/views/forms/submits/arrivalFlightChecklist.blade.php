@extends('layouts.master')

@section('content')
    <h1 class="lead">Arrival flight checklist</h1>
    {{Form::open(['url' => 'forms/save/arrival_flight_checklist'])}}
    @csrf

    @php $parts = array('site_survey',
'flight_plan',
'airframe',
'camera',
'av_connections',
'propellors',
'calibration_platform',
'ground_station',
'av_monitor',
'crew_identification_badges',
'hard_hat_fluorescent_jackets',
'two_way_radios',
'first_aid_kit',
'fire_extinguisher',
'cordens_signs_and_safety_tape'
 );

$current = 0;
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp

        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::checkbox($part, true)}}
        </div>

        @php $current++; @endphp

    @endwhile

    {{Form::close()}}

@endsection