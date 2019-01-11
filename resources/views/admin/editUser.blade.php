@extends('layouts.master')

@section('content')
    {{json_encode($user)}}
@endsection