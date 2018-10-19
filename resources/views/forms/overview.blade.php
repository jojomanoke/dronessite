@extends('layouts.master')

@section('content')

@foreach($forms as $form)
    {{$form->user_id}}
@endforeach

@endsection