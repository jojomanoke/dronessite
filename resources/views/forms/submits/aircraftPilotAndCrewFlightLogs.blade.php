@extends('layouts.master')

@section('content')
    <h1 class="lead">Aircraft pilot and crew flight logs</h1>
    @php if(session()->get('aircraft_pilot_and_crew_flight_logs') != null){$id = session()->get('aircraft_pilot_and_crew_flight_logs');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/aircraft_pilot_and_crew_flight_logs'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/aircraft_pilot_and_crew_flight_logs', 'files' => true])}}
    @endisset
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
        {{Form::label("date", "Datum")}}
        {{Form::date("date", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("take_off_time", "Take off time")}}
        {{Form::time("take_off_time", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("landing_time", "Landing time")}}
        {{Form::time("landing_time", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("duration", "Duration")}}
        {{Form::number("duration", $data->duration)}}
    </div>

    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp

    <div class="form-group">
        {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
        {{Form::text($part, $data->$part, ['class' => 'form-control'])}}
    </div>
    @php $current++; @endphp

    @endwhile

    <div class="pb-5">
        {{Form::submit(__('strings.save'), ['class' => 'btn btn-success float-left'])}}
        {{Form::close()}}

        @isset($id)
            {{Form::open(['url' => 'forms/save/aircraft_pilot_and_crew_flight_logs'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/aircraft_pilot_and_crew_flight_logs'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection