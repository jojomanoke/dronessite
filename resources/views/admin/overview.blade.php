@extends('layouts.master')

@section('content')
    <div class="table-responsive">
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
                        <td>
                            <div class="btn btn-group">
                                <a href="{{url('admin/'.$user->id.'/all')}}" class="btn btn-success">{{__('forms.show_submitted')}}</a>
                                <a href="{{url('admin/'.$user->id.'/edit')}}" class="btn btn-secondary" disabled>{{__('admin.edit_user')}}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
