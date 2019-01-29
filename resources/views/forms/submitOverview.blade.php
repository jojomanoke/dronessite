@extends('layouts.master')
@section('content')
    {{--{{json_encode($form->operational_flight_plan()->first()->submitted)}}--}}
    @foreach($columns as $key => $column)
        @php $f = $form->$column()->first()['submitted'];@endphp
        @csrf
        <div id="accordion_{{$key}}">
            <div class="card border-primary">
                <div class="card-header bg-dark-primary" id="heading_{{$key}}">
                    <h5 class="mb-0">
                        <a class="text-black" style="cursor: pointer;" data-toggle="collapse" data-target="#collapse_{{$key}}" aria-expanded="true" aria-controls="collapse_{{$key}}">
                            {{ucwords(str_replace('_', ' ', $column))}}
                        </a>
                    </h5>
                </div>

                <div id="collapse_{{$key}}" class="collapse show" aria-labelledby="heading_{{$key}}" data-parent="#accordion_{{$key}}">
                    <div class="card-body bg-dark-primary">
                        <div class="row">
                            @if($f)
                                <div class="col float-left">{{__('forms.submitted')}}</div>
                            @elseif(session()->get($column) != null)
                                <div class="col float-left">{{__('forms.edited')}}</div>
                                <div class="col text-right float-right">
                                    <a class="btn btn-warning" href="{{url('forms/submit'.'/'.$column)}}">{{__('strings.edit')}}</a>
                                </div>
                            @else
                                    <div class="col float-left">{{__('forms.not_submitted')}}</div>
                                    <div class="col float-right text-right">
                                        <a class="btn btn-secondary" href="{{url('forms/submit'.'/'.$column)}}">{{__('strings.create')}}</a>
                                    </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    @endforeach

    @if($user->role_id == 1 && $form->user_id != $user->id)
                <a href="{{url('/admin/approve'. $form->id)}}" class="btn btn-success mt-3 float-right">{{__('admin.approve')}}</a>
    @endif
@endsection