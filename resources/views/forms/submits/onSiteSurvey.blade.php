@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/operational_flight_plan', 'files' => true])}}
    @csrf

    @php $parts = array('pilot_in_command',
'observer',
'obstructions',
'view_limitations',
'people',
'livestock',
'temperature',
'visibility',
'surface',
'permission',
'public',
'air_traffic',
'communication',
'proximity',
'take_off_area',
'landing_area',
'operational_zone',
'emergency_area',
'holding_area');

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


    {{Form::close()}}

@endsection