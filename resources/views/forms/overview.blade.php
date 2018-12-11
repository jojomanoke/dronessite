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

                    <div class="btn-group rounded" role="group" aria-label="Basic example">
                        <button type="button" onclick="window.location.href= `{{url('/forms/submit/progress').'/'.$form->id}}`" class="btn btn-warning">@if($user->role_id == 1) Show @else Edit @endif</button>
                        <button type="button" data-toggle="modal" data-target="#confirm-{{$form->id}}" class="btn btn-secondary">Delete</button>
                    </div>

                </td>
            {{--onclick="window.location.href= `{{url('/forms/delete/'.$form->id)}}`"--}}
            </tr>

            <div class="modal fade" id="confirm-{{$form->id}}" tabindex="-1" role="dialog" aria-labelledby="confirm-label-{{$form->id}}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirm-label-{{$form->id}}">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="window.location.href= `{{url('/forms/delete/'.$form->id)}}`">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        </tbody>
    </table>

@endsection