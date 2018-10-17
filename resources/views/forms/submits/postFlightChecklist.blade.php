@extends('layouts.master')

@section('content')
    <h1 class="lead">Post flight checklist</h1>
    {{Form::open(['url' => 'forms/save/post_flight_checklist'])}}
    @csrf

    @php $parts = array('touchdown',
'power_down',
'removal',
'data_recording',
'transmitter',
'camera',
'airframe',
'battery',
'memory_card',
'review'
 );

$current = 0;
    @endphp
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp

        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::checkbox($part, true)}}
        </div>

        @php $current++; @endphp

    @endwhile

    {{Form::close()}}

@endsection