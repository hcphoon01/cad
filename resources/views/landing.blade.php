@extends('layouts.home')

@section('content')
<div class="center">
    <h1>Welcome to EmergencyRP</h1>
    <div class="row justify-content-md-center">
        <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Apply Now</a>
    </div>
    <br>
    <div class="row justify-content-md-center">
        <a class="btn btn-primary" href="{{route('login')}}" role="button">Log In</a>
    </div>
</div>
@endsection