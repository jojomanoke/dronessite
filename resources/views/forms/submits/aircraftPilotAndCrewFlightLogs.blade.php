@extends('layouts.master')

@section('content')
    <h1 class="lead">Aircraft pilot and crew flight logs</h1>
    {{Form::open['url' => 'forms/save/aircraft_pilot_and_crew_flight_logs']}}
    @csrf

    @php $parts = array(
'aircraft',
'aircraft_system',
'engine_battery_no',
'pilot_in_command',
'observer',
'payload_operator',
'location',
'purpose_of_flight',
'comments');

    $current = 0;
    @endphp

    <div class="form-group">
        {{Form::label("date", ucwords(str_replace("_", " ", "datum")))}}
        {{Form::date("date", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("take_off_time", ucwords(str_replace("_", " ", "take_off_time")))}}
        {{Form::time("take_off_time", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("landing_time", ucwords(str_replace("_", " ", "landing_time")))}}
        {{Form::date("landing_time", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("landing_time", ucwords(str_replace("_", " ", "landing_time")))}}
        {{Form::number("landing_time", ['class' => 'form-control'])}}
    </div>

    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp

    <div class="form-group">
        {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
        {{Form::text($part, isset($data->$part), ['class' => 'form-control'])}}
    </div>
    @php $current++; @endphp

    @endwhile

    {{Form::close()}}



    @endphp

@endsection