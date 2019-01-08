@extends('layouts.master')

@section('content')
    <h1 class="lead">Arrival flight checklist</h1>
    @php if(session()->get('arrival_flight_checklist') != null){$id = session()->get('arrival_flight_checklist');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/arrival_flight_checklist'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/arrival_flight_checklist', 'files' => true])}}
    @endisset
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
            {{Form::open(['url' => 'forms/save/arrival_flight_checklist'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/arrival_flight_checklist'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>

@endsection