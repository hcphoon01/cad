@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Application Form</h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <form action="post" class="form">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="{{Auth::user()->name}}" disabled>
                                <small id="nameHelp" class="form-text text-muted">If this is incorrect please contact a
                                    member of HR.</small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" class="form-control" name="email" id="email"
                                    placeholder="{{Auth::user()->email}}" disabled>
                                <small id="emailHelp" class="form-text text-muted">If this is incorrect please contact a
                                    member of HR.</small>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" class="form-control" name="age" id="age"
                                    placeholder="Enter your age">
                                <small id="ageHelp" class="form-text text-muted">You must be over 13 to join.</small>
                            </div>
                            <div class="form-group">
                                <label for="division">Division</label>
                                <select id="division" class="form-control">
                                    <option selected>Choose a Division...</option>
                                    @foreach ($divisions as $division)
                                    @if ($division->is_open)
                                    <option value="{{$division->id}}">
                                        {{$division->name}}
                                    </option>
                                    @else
                                    <option disabled>
                                        {{$division->name}} is currently closed for recruitment
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="joinReason">Why would you like to join EmergencyRP?</label>
                                <textarea class="form-control" id="join_eason" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="previousCommunity">What roleplay communities have you been in previously? Include any training and positions of responsability, if applicable.</label>
                                <textarea class="form-control" id="previous_community" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection