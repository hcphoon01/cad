@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h2>Create a Password</h2>
            <small class="text-muted">If any of the information below is incorrect, please contact a member of
                HR</small>
            <form action="{{route('auth.password.store', ['token' => $token])}}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" disabled
                            value="{{$user->name}}" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" name="email" id="email" class="form-control" disabled
                            value="{{$user->email}}" />
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="shoulder_number">Shoulder Number</label>
                                <input type="text" name="shoulder_number" id="shoulder_number" class="form-control"
                                    disabled value="{{$user->data ? $user->data->shoulder_number : ''}}" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="division">Division</label>
                                <input type="text" name="division" id="division" class="form-control" disabled
                                    value="{{$user->data ? $user->data->division->name : ''}}" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control {{ $errors->has('password') ? 'border-danger' : '' }}" required
                                    autocomplete="new-password">
                                @if($errors->has('password'))
                                <p class="help text-danger">
                                    {{ $errors->first('password') }}
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password_confirm">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirm"
                                    class="form-control" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Set Password <i class=" fa fa-pencil"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection