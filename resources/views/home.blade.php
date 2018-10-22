@extends('layouts.master')
{{json_encode(session()->all())}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-dark-primary">
                <div class="card-header bg-dark-primary">Dashboard</div>

                <div class="card-body bg-dark-primary">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in {{$user->name}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
