@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Announcements</h2>
                <div class="card-body">
                    <h5 class="card-title">New Website</h5>
                    <p class="card-text">Lorem ipsum</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">New CAD</h5>
                    <p class="card-text">Lorem ipsum</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Stats</h2>
                <div class="card-body">
                    <h5 class="card-title">Patrol Numbers</h5>
                    <p class="card-text">1</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Fleet Count</h5>
                    <p class="card-text">50</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total Calls</h5>
                    <p class="card-text">50</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Events</h2>
                <div class="card-body">
                    <h5 class="card-title">Daily Patrol</h5>
                    <p class="card-text">19:00 - 22:00</p>
                    <a href="#" class="btn btn-success">Book On</a>
                </div>
            </div>
            <div class="card mt-3 flex-grow-1">
                <h2 class="card-header">CC's Commendation</h2>
                <div class="card-body">
                    <h5 class="card-title">Name: H.Cameron</h5>
                    <p class="card-text">Description: Made ERP such an amazing website</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection