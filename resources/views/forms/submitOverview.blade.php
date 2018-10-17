@extends('layouts.master')
@php
    $parts = array(
    'operational_flight_plan',
    'pre_site_survey',
    'pre_flight_checklist',
    'on_site_survey',
    'maintenance_log',
    'incident_log',
    'embarkation_checklist',
    'aircraft_pilot_and_crew_flight_logs',
    'arrival_flight_checklist',
    'post_flight_checklist',
    'battery_log'
    );
$current = 0;
if(isset($data)){
    $form = toArray($form);
}
else{
    $data = null;
}
@endphp
@section('content')
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp
        @csrf
        <div id="accordion_{{$current}}">
            <div class="card">
                <div class="card-header bg-primary" id="heading_{{$current}}">
                    <h5 class="mb-0">
                        <a class="text-black" style="cursor: pointer;" data-toggle="collapse" data-target="#collapse_{{$current}}" aria-expanded="true" aria-controls="collapse_{{$current}}">
                            {{ucwords(str_replace('_', ' ', $parts[$current]))}}
                        </a>
                    </h5>
                </div>

                <div id="collapse_{{$current}}" class="collapse show" aria-labelledby="heading_{{$current}}" data-parent="#accordion_{{$current}}">
                    <div class="card-body">
                        <div class="row">
                            @if(session()->get($part) != null)
                                <div class="col float-left">You have submitted this part</div>
                                <div class="col text-right float-right">
                                    <a class="btn btn-warning" href="{{url('forms/submit'.'/'.$part)}}">Edit</a>
                                </div>
                            @else
                                <div class="col float-left">You have not submitted this yet</div>
                                <div class="col float-right text-right">
                                    <a class="btn btn-secondary" href="{{url('forms/submit'.'/'.$part)}}">Submit</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @php $current++; @endphp
    @endwhile
@endsection