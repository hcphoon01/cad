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
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card flex-grow-1">
                <h2 class="card-header">Events</h2>
                <div class="card-body">
                    <h5 class="card-title">Patrol</h5>
                    <p class="card-text">Next Patrol</p>
                </div>
            </div>
            <div class="card mt-3 flex-grow-1">
                <h2 class="card-header">CC's Commendation</h2>
                <div class="card-body">
                    <h5 class="card-title">Name: </h5>
                    <p class="card-text">Commendation: </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection