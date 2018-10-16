@extends('layouts.master')

@section('content')
    <h1 class="lead">Pre site survey</h1>
    @php if(session()->get('pre_site_survey') != null){$id = session()->get('pre_site_survey');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/pre_site_survey'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/pre_site_survey', 'files' => true])}}
    @endisset
    @csrf

    @php
        /*
        * Creates the array that holds all the text inputs for the form.
        */
        $parts = array('pilot_in_command','uav_registration','helper_1','helper_2','latitude_longitude','altitude_from_sea_level','work_required','downloaded_map_to_groundstation','vehicular_access','airspace_type','terrain_type','proximities','hazards','restrictions','sensitivities','people','livestock','permission','access','footpaths','alternate','risk_reduction','weather','notams','local_air_traffic_control','regional_air_traffic_control','military_control','notice_to_airmen');

        /*
        * Resets the loop counter on page reload
        */
        $current = 0;
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::text($part, $data->$part, ['class' => 'form-control'])}}
        </div>
        @php $current++; @endphp

        @endwhile
    <div class="form-group">
        {{Form::label('date_work_required', 'Date work required')}}
        {{Form::date('date_work_required', \Carbon\Carbon::parse($data->date_work_required)->format('Y-m-d'), ['class' => 'form-date'])}}
    </div>
    {{Form::submit('Save', ['class' => 'btn btn-success'])}}

        {{Form::close()}}

@endsection