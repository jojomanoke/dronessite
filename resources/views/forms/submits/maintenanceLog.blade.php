@extends('layouts.master')

@section('content')
    <h1 class="lead">Maintenance log</h1>
    {{Form::open(['url' => 'forms/save/maintenance_log'])}}
    @csrf

    @php $parts = array(
'date',
'reason',
'work_done',
'parts_replaced',
'notes'
 );

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

    <div class="form-group">
        {{Form::label("system_tested", ucwords(str_replace("_", " ", "system_tested")))}}
        {{Form::checkbox("system_tested", true)}}
    </div>

    {{Form::close()}}

@endsection