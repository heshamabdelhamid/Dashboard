@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">this is your account </div>
                <p class="text-success">this email : {{$user['name']}}</p>
                <p class="text-success">this name  : {{$user['email']}}</p>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
