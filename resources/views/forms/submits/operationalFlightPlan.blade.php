@extends('layouts.master')

@section('content')
    <h1 class="lead">Operational Flight Plan</h1>
    {{Form::open(['url' => 'forms/save/operational_flight_plan'])}}
    @csrf
    <div class="form-group">
        {{Form::label('pilot_in_command', 'The pilot in command')}}
        {{Form::text('pilot_in_command', isset($data->pilot_in_command), ['class' => 'form-control', 'placeholder' => 'Jack Smith'])}}
    </div>

    {{Form::close()}}

@endsection