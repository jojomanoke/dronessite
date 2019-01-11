@extends('layouts.master')

@section('content')
    @php json_encode($user); @endphp
@endsection
}