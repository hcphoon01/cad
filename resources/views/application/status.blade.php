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
                    <h3>View your application status</h3>
                </div>
                @if (Session::has('formComplete'))
                <div class="alert alert-success text-center alert-dismissible" role="alert">
                    Your application has been submitted, it is now undergoing review by Gold Command and you will
                    receive emails updating you on its progress.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="text-center">
                    <h4>{{$applicant->applicationStageText()}}</h4>
                </div>
                <div class="progress">
                    <div class="progress-bar {{$applicant->applicationStage() == '100' ? 'bg-success' : ''}}"
                        role="progressbar" style="width: {{$applicant->applicationStage()}}%"
                        aria-valuenow="{{$applicant->applicationStage()}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <br>
                <div class="row-fluid text-center">
                    @if(!$applicant->form)
                    <a class="btn btn-primary" href="{{route('application.form')}}" role="button">Submit an Application
                        Form</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection