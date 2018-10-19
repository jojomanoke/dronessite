@extends('layouts.master')

@section('content')
    <h1 class="lead">Battery log</h1>

    @php if(session()->get('battery_log') != null){$id = session()->get('battery_log');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/battery_log'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/battery_log', 'files' => true])}}
    @endisset
    @csrf


    <div class="form-group">
        {{Form::label("battery_number", ucwords(str_replace("_", " ", "battery_number")))}}
        {{Form::number("battery_number", $data->battery_number)}}
    </div>

    <div class="form-group">
        {{Form::label('battery_residual', ucwords(str_replace("_", " ", 'battery_residual')))}}
        {{Form::text('battery_residual', $data->battery_residual, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label("date_of_charge", ucwords(str_replace("_", " ", "date_of_charge")))}}
        {{Form::date("date_of_charge", \Carbon\Carbon::now())}}
    </div>

    <div class="form-group">
        {{Form::label("charge_input", ucwords(str_replace("_", " ", "charge_input")))}}
        {{Form::text("charge_input", $data->charge_input, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label("flight_duration", ucwords(str_replace("_", " ", "flight_duration")))}}
        {{Form::number("flight_duration", $data->flight_duration)}}
    </div>

    <div class="form-group">
        {{Form::label('pre_flight', ucwords(str_replace("_", " ", 'pre_flight')))}}
        {{Form::text('pre_flight', $data->pre_flight, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('notes', ucwords(str_replace("_", " ", 'notes')))}}
        {{Form::text('notes', $data->notes, ['class' => 'form-control'])}}
    </div>


    {{Form::submit('Save', ['class' => 'btn btn-success'])}}
    {{Form::close()}}

@endsection