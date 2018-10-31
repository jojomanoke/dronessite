@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Student number</th>
            <th scope="col">Email</th>
            <th scope="col">User Role</th>
            <th scope="col">Submitted forms</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->student_number}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->user_role->name}}</td>
                <td>{{$user->submitted_forms}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection