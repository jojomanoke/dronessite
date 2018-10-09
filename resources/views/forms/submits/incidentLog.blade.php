@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/pre_flight_survey'])}}
    @csrf

    @php $parts = array(
'date_of_incident',
'time_of_incident',
'damage',
'incident_details',
'action_taken',
'notes'
 );

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
        {{Form::label("date_of_incident", ucwords(str_replace("_", " ", "date_of_incident")))}}
        {{Form::date("date_of_incident" \Carbon\Carbon::now());}}
    </div>

    {{Form::close()}}

@endsection