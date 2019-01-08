@extends('layouts.master')

@section('content')
    <h1 class="lead">On site survey</h1>
    @php if(session()->get('on_site_survey') != null){$id = session()->get('on_site_survey');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/on_site_survey'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/on_site_survey', 'files' => true])}}
    @endisset
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
            {{Form::text($part, $data->$part, ['class' => 'form-control'])}}
        </div>
        @php $current++; @endphp

    @endwhile

    <div class="pb-5">
        {{Form::submit(__('strings.save'), ['class' => 'btn btn-success float-left'])}}
        {{Form::close()}}

        @isset($id)
            {{Form::open(['url' => 'forms/save/on_site_survey'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/on_site_survey'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection