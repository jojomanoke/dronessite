@extends('layouts.master')

@section('content')
    @php $records = count($forms); @endphp
    <a class="btn btn-success float-right mb-4" href="{{url('forms/submit/new')}}">New</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Time added</th>
            <th scope="col">Last updated</th>
            <th scope="col">Completed</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($forms as $key => $form)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$form->created_at}}</td>
                <td>{{$form->updated_at}}</td>
                <td>
                    @php
                        $complete = true;
                                foreach($form->getAttributes() as $attribute){
                                    if($attribute === null){
                                        $complete = false;
                                        break;
                                    }
                            }
                        if($complete){
                            echo 'Yes';
                        }
                        else{
                            echo 'No';
                        }
                    @endphp
                </td>
                <td>
                    <div class="btn-group rounded" role="group" aria-label="Form actions">
                        <a type="button" class="btn btn-warning" href="{{url('/forms/submit/progress').'/'.$form->id}}"> @if($user->user_role->id == 2) Show @else Edit @endif</a>
                        <a type="button" class="btn btn-secondary" href="{{url('/forms/delete/'.$form->id)}}">Delete</a>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

@endsection