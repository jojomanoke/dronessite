@extends('layouts.master')

@section('content')
    <h1 class="lead">Maintenance log</h1>
    @php if(session()->get('maintenance_log') != null){$id = session()->get('maintenance_log');} @endphp
    @isset($id)
        {{Form::open(['url' => 'forms/save/maintenance_log'.'/'.$id, 'files' => true])}}
    @else
        {{Form::open(['url' => 'forms/save/maintenance_log', 'files' => true])}}
    @endisset
    @csrf

    @php $parts = array(
'reason',
'work_done',
'parts_replaced',
'notes'
 );

$current = 0;
    @endphp
    <div class="form-group">
        {{Form::label('date', 'Date')}}
        {{Form::date('date', \Carbon\Carbon::parse($data->date)->format('Y-m-d'), ['class' => 'form-date'])}}
    </div>
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp



        <div class="form-group">
            {{Form::label($part, ucwords(str_replace("_", " ", $part)))}}
            {{Form::text($part, $data->$part, ['class' => 'form-control'])}}
        </div>
        @php $current++; @endphp

    @endwhile

    @if($data->system_tested === 1)
        <div class="form-group">
            {{Form::label('system_tested', ucwords(str_replace("_", " ", 'system_tested')))}}
            {{Form::checkbox('system_tested', true, ['checked'])}}
        </div>
    @else
        <div class="form-group">
            {{Form::label('system_tested', ucwords(str_replace("_", " ", 'system_tested')))}}
            {{Form::checkbox('system_tested', true)}}
        </div>
    @endif
    <div class="pb-5">
        {{Form::submit(__('strings.save'), ['class' => 'btn btn-success float-left'])}}
        {{Form::close()}}

        @isset($id)
            {{Form::open(['url' => 'forms/save/maintenance_log'.'/'.$id.'/'.'submit', 'files' => true])}}
        @else
            {{Form::open(['url' => 'forms/save/maintenance_log'.'/'.'submit', 'files' => true])}}
        @endisset
        {{Form::submit(__('forms.send'), ['class' => 'btn btn-warning float-right'])}}
        {{Form::close()}}
    </div>
@endsection