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
                        <form class="form" action="{{route('application.create-form')}}" method="POST">
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
                                <input type="text" class="form-control {{ $errors->has('age') ? 'border-danger' : '' }}"
                                    name="age" id="age" placeholder="Enter your age">
                                <small id="ageHelp"
                                    class="form-text {{ $errors->has('age') ? 'text-danger' : 'text-muted' }}">You must
                                    be over 15 to join.</small>
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of Birth</label>
                                <input class="form-control {{ $errors->has('dob') ? 'border-danger' : '' }}" type="date"
                                    id="dob" name="dob" placeholder="dd/mm/yyy">
                                <small id="ageHelp" class="form-text text-muted">You must
                                    be over 15 to join.</small>
                                @if($errors->has('dob'))
                                <p class="help text-danger">
                                    {{ $errors->first('dob') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="discord">Full Discord Tag</label>
                                <input class="form-control {{ $errors->has('discord') ? 'border-danger' : '' }}"
                                    type="text" id="discord" name="discord" placeholder="dd/mm/yyy">
                                <small id="discordHelp" class="form-text text-muted">This is in the form Username#4
                                    Digits. For example Test#1234, this can be found on the front page of the Discord
                                    settings.</small>
                                @if($errors->has('discord'))
                                <p class="help text-danger">
                                    {{ $errors->first('discord') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="division">Division</label>
                                <select id="division" name="division"
                                    class="form-control {{ $errors->has('division') ? 'border-danger' : '' }}">
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
                                @if($errors->has('division'))
                                <p class="help text-danger">
                                    {{ $errors->first('division') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="join_reason">Why would you like to join City of London RP?</label>
                                <textarea class="form-control {{ $errors->has('join_reason') ? 'border-danger' : '' }}"
                                    id="join_reason" rows="3" name="join_reason"></textarea>
                                @if($errors->has('join_reason'))
                                <p class="help text-danger">
                                    {{ $errors->first('join_reason') }}
                                </p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="previousCommunity">What roleplay communities have you been in previously?
                                    Include any training and positions of responsibility, if applicable.</label>
                                <textarea
                                    class="form-control {{ $errors->has('previous_community') ? 'border-danger' : '' }}"
                                    id="previous_community" rows="3" name="previous_community"></textarea>
                                @if($errors->has('previous_community'))
                                <p class="help text-danger">
                                    {{ $errors->first('previous_community') }}
                                </p>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Application</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection