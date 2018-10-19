@extends('layouts.master')

@section('content')
@php $records = count($forms); @endphp
{{json_encode($forms)}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        @foreach($forms as $key => $form)
            <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection