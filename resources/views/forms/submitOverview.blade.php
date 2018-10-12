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
if(isset($data) && $data != null || $data    != '[]'){
    $form = $form->toArray();
}
@endphp
{{json_encode(session()->get('operational_flight_plan'))}}
@section('content')
    @while(count($parts) > $current)
        @php $part = $parts[$current] @endphp
        @csrf
        <div id="accordion_{{$current}}">
            <div class="card">
                <div class="card-header" id="heading_{{$current}}">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_{{$current}}" aria-expanded="true" aria-controls="collapse_{{$current}}">
                            {{ucwords(str_replace('_', ' ', $parts[$current]))}}
                        </button>
                    </h5>
                </div>

                <div id="collapse_{{$current}}" class="collapse show" aria-labelledby="heading_{{$current}}" data-parent="#accordion_{{$current}}">
                    <div class="card-body">
                        <div class="row">
                            @if(isset($form[$current]))
                                <div class="col float-left">You have submitted this part</div>
                                <div class="col float-right">
                                    <a class="btn btn-warning" href="{{url('forms/submit'.'/'.$parts[$current])}}">Edit</a>
                                </div>
                            @else
                                <div class="col float-left">You have not submitted this yet</div>
                                <div class="col float-right text-right">
                                    <a class="btn btn-success" href="{{url('forms/submit'.'/'.$parts[$current])}}">Submit</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @php $current++; @endphp
    @endwhile
@endsection