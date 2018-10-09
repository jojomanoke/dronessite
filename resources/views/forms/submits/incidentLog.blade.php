@extends('layouts.master')

@section('content')
    <h1 class="lead">Incident log</h1>
    {{Form::open(['url' => 'forms/save/incident_log'])}}
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
        {{Form::date("date_of_incident", \Carbon\Carbon::now())}}

     <div class="form-group">
        {{Form::label("time_of_incident", ucwords(str_replace("_", " ", "time_of_incident")))}}
        {{Form::time("time_of_incident", \Carbon\Carbon::now())}}
    </div>

    {{Form::close()}}

@endsection