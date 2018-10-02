@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/operational_flight_plan'])}}
    @csrf
    <div class="form-group">
        {{Form::label('pilot_in_command', 'The pilot in command')}}
        {{Form::text('pilot_in_command', isset($data->pilot_in_command), ['class' => 'form-control', 'placeholder' => 'Jack Smith'])}}
    </div>
    <div class="form-group">
        {{Form::label('obeserver', 'The observer')}}
        {{Form::text('observer', isset($data->observer), ['class' => 'form-control', 'placeholder' => 'John Doe'])}}
    </div>
    <div class="form-group">
        {{Form::label('payload_operator', 'Payload operator')}}
        {{Form::text('payload_operator', isset($data->payload_operator), ['class' => 'form-control', 'placeholder' => 'Fred Hinkle'])}}
    </div>
    <div class="form-group">
        {{Form::label('helper_1', 'Helper')}}
        {{Form::text('helper', isset($data->helper_1), ['class' => 'form-control', 'placeholder' => 'Marion Allen'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'Address')}}
        {{Form::text('address', isset($data->address), ['class' => 'form-control', 'placeholder' => 'Gale Simmons'])}}
    </div>
    <div class="form-group">
        {{Form::label('latitude_longitude', 'Latitude and longitude')}}
        {{Form::text('latitude_longitude', isset($data->latitude_longitude), ['class' => 'form-control', 'placeholder' => ' 5.921409, 3.398324'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('vehicular_access', 'Vehicular acces')}}
        {{Form::text('vehicular_access', isset($data->vehicular_access), ['class' => 'form-control', 'placeholder' => 'yes'])}}
    </div>
    <div class="form-group">
        {{Form::label('purpose_of_the_flight', 'Purpose of the flight')}}
        {{Form::text('purpose_of_the_flight', isset($data->purpose_of_the_flight), ['class' => 'form-control', 'placeholder' => 'Reason'])}}
    </div>
    <div class="form-group">
        {{Form::label('type_of_operator', 'Type of operator')}}
        {{Form::text('type_of_operator', isset($data->type_of_operator), ['class' => 'form-control', 'placeholder' => ''])}}
    </div>
    <div class="form-group">
        {{Form::label('date_work_required', 'Date work required')}}
        {{Form::text('date_work_required', isset($data->date_work_required), ['class' => 'form-control', 'placeholder' => 'yes'])}}
    </div>
    <div class="form-group">
        {{Form::label('mission_duration', 'Mision duration')}}
        {{Form::text('mission_duration', isset($data->mission_duration), ['class' => 'form-control', 'placeholder' => '20'])}}
    </div>
    <div class="form-group">
        {{Form::label('cruising_altitude', 'Cruising altitude')}}
        {{Form::text('cruising_altitude', isset($data->cruising_altitude), ['class' => 'form-control', 'placeholder' => '50'])}}
    </div>
    <div class="form-group">
        {{Form::label('maximum_altitude', 'Maximum altitude')}}
        {{Form::text('maximum_altitude', isset($data->maximum_altitude), ['class' => 'form-control', 'placeholder' => '75'])}}
    </div>
    <div class="form-group">
        {{Form::label('maximum_distance', 'Maximum distance')}}
        {{Form::text('maximum_distance', isset($data->maximum_distance), ['class' => 'form-control', 'placeholder' => '50'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('satellite_picture', 'Satellite picture')}}
        {{Form::file('satellite_picture', null, ['class' => 'form-file'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    <div class="form-group">
        {{Form::label('elevation', 'Elevation')}}
        {{Form::text('elevation', isset($data->elevation), ['class' => 'form-control', 'placeholder' => '15'])}}
    </div>
    {{Form::close()}}

@endsection