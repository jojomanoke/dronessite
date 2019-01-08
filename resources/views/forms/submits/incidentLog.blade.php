@extends('layouts.master')

@section('content')
    <h1 class="lead">Incident log</h1>
    @php if(session()->get('incident_log') != null){$id = session()->get('incident_log');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/incident_log'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/incident_log', 'files' => true])}}
    @endisset
    @csrf

    @php $parts = array(
'damage',
'incident_details',
'action_taken',
'notes'
 );

$current = 0;
    @endphp
    <div class="form-group">
        {{Form::label("date_of_incident", ucwords(str_replace("_", " ", "date_of_incident")))}}
        {{Form::date("date_of_incident", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("time_of_incident", ucwords(str_replace("_", " ", "time_of_incident")))}}
        {{Form::time("time_of_incident", \Carbon\Carbon::parse($data->time_of_incident)->format('H:m'))}}
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
            {{Form::open(['url' => 'forms/save/incident_log'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/incident_log'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection