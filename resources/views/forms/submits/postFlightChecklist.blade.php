@extends('layouts.master')

@section('content')
    <h1 class="lead">Post flight checklist</h1>
    @php if(session()->get('post_flight_checklist') != null){$id = session()->get('post_flight_checklist');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/post_flight_checklist'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/post_flight_checklist', 'files' => true])}}
    @endisset
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
            {{Form::open(['url' => 'forms/save/post_flight_checklist'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/post_flight_checklist'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>

@endsection