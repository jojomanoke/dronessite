@extends('layouts.master')
@section('content')

    <h1 class="lead">Pre flight checklist</h1>
    @php if(session()->get('pre_flight_checklist') != null){$id = session()->get('pre_flight_checklist');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/pre_flight_checklist'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/pre_flight_checklist', 'files' => true])}}
    @endisset
    @csrf

    @php

    $parts = array('airframe','flight_battery','transmitters','camera','airframe_calibration','flight_battery_props','self_diagnostic','monitor','calibration','save_calibration','camera_platform','telemetry_link','flight_plan','camera_recording','aircraft_alignment','crew_public_client','clearance','power_up','take_off','communication','landing');

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
            {{Form::open(['url' => 'forms/save/pre_flight_checklist'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/pre_flight_checklist'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection

@section('footer')

@endsection