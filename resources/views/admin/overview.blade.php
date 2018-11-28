@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">User Role</th>
            <th scope="col">Forms</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->student_number}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_role->name}}</td>
                <td>{{count($user->submitted_forms)}}</td>
                <td><a href="{{url('admin/'.$user->id.'/all')}}" class="btn btn-success">Show submitted forms</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection