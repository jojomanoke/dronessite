@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Name</th>
            <th scope="col">Student number</th>
            <th scope="col">Submitted forms</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->student_number}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_role->name}}</td>
                <td><a href="{{url('admin/'.$user->id.'/all')}}" class="btn btn-success">Show submitted forms</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection