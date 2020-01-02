@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3>View Applicant Details</h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card px-3 py-3">
                                            <div class="card-title text-center">
                                                <h4>Applicant Name: {{$applicant->user->name}}</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <h5>Division Joining:</h5> {{$applicant->form->division->name}}
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">
                                                        <h5>Email Address:</h5>
                                                    </label>
                                                    <span class="form-control" type="email" name="email" id="email"
                                                        disabled>{{$applicant->user->email}}</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">
                                                        <h5>Age:</h5>
                                                    </label>
                                                    <input class="form-control" type="text" name="age" id="age"
                                                        placeholder="{{$applicant->form->age}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="d0b">
                                                        <h5>Date of Birth:</h5>
                                                    </label>
                                                    <input class="form-control" type="text" name="d0b" id="d0b"
                                                        placeholder="{{$applicant->form->formatDOB()}}" disabled>
                                                </div>
                                                <label for="progress">
                                                    <h5>Progress:</h5>
                                                    <p>{{$applicant->applicationStageText()}}</p>
                                                </label>
                                                <div class="progress">
                                                    <div id="progress"
                                                        class="progress-bar {{$applicant->applicationStage() == '100' ? 'bg-success' : ''}}"
                                                        role="progressbar"
                                                        style="width: {{$applicant->applicationStage()}}%"
                                                        aria-valuenow="{{$applicant->applicationStage()}}"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row py-3">
                                    <div class="col">
                                        <div class="card py-3 px-3">
                                            <div class="card-title text-center">
                                                <h4>Actions</h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="container">
                                                    <div class="row justify-content-md-center">
                                                        <div class="col">
                                                            <a class="btn btn-success"
                                                                href="{{route('hr.progress', ['applicant'=>$applicant])}}">
                                                                <i class="fa fa-check"></i> Progress</a>
                                                        </div>
                                                        <div class="col">
                                                            <a class="btn btn-danger" href="#">
                                                                <i class="fa fa-times"></i> Reject</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card">
                                    <div class="card-title text-center px-3 py-3">
                                        <h4>Application Form</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="join_reason">
                                                <h5>Reason for Joining:</h5>
                                            </label>
                                            <textarea class="form-control" type="join_reason" name="join_reason"
                                                id="join_reason" disabled>{{$applicant->form->join_reason}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="previous_community">
                                                <h5>Previous Community:</h5>
                                            </label>
                                            <textarea class="form-control" type="previous_community"
                                                name="previous_community" id="previous_community"
                                                disabled>{{$applicant->form->previous_community}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection