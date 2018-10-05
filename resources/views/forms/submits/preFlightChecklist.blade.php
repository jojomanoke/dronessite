@extends('layouts.master')
@section('content')

    <h1 class="lead">Pre flight checklist</h1>
    {{Form::open(['url' => 'forms/save/pre_flight_checklist'])}}
    @csrf

    @php

    $parts = array('airframe','flight_battery','transmitters','camera','airframe_calibration','flight_battery_props','self_diagnostic','monitor','calibration','save_calibration','camera_platform','telemetry_link','flight_plan,','camera_recording','aircraft_alignment','crew_public_client','clearance','power_up','take_off','communication','landing');

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
@endsection