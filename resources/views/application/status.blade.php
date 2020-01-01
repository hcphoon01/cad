@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row-fluid">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Application Status</h2>
                </div>
                <div class="card-body">
                    <div class="card-title text-center">
                        <h4>View your application status</h4>
                    </div>
                    <div class="progress">
                    <div class="progress-bar {{$applicant->applicationStage() == '100' ? 'bg-success' : ''}}" role="progressbar" style="width: {{$applicant->applicationStage()}}%" aria-valuenow="{{$applicant->applicationStage()}}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection