@extends('layouts.master')

@section('content')
    <h1 class="lead">Battery log</h1>

    {{Form::open(['url' => 'forms/save/post_flight_checklist'])}}
    @csrf


    <div class="form-group">
        {{Form::label("battery_number", "Batterij procent")}}
        {{Form::number("battery_number", null)}}
    </div>

    <div class="form-group">
        {{Form::label('battery_residual', 'Batterij overblijfsel')))}}
        {{Form::text('battery_residual', isset($data->'battery_residual'), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label("date_of_charge", "Datum opgeladen")}}
        {{Form::date("date_of_charge", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("charge_input", ucwords(str_replace("_", " ", "charge_input")))}}
        {{Form::text("charge_input", isset($data->"charge_input"), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label("flight_duration", "Vlucht duratie")}}
        {{Form::number("flight_duration", null)}}
    </div>

    <div class="form-group">
        {{Form::label('pre_flight', ucwords(str_replace("_", " ", 'pre_flight')))}}
        {{Form::text('pre_flight', isset($data->'pre_flight'), ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('notes', ucwords(str_replace("_", " ", 'notes')))}}
        {{Form::text('notes', isset($data->'notes'), ['class' => 'form-control'])}}
    </div>



    {{Form::close()}}

@endsection