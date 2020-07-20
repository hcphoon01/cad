@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col text-center">
        <h2>Create a User</h2>
        <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" required
                        value="{{old('name')}}" />
                    @if($errors->has('name'))
                    <p class="help text-danger">
                        {{ $errors->first('name') }}
                    </p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="text" name="email" id="email"
                        class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" required
                        value="{{old('email')}}" />
                    @if($errors->has('email'))
                    <p class="help text-danger">
                        {{ $errors->first('email') }}
                    </p>
                    @endif
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="shoulder_number">Shoulder Number</label>
                            <input type="text" name="shoulder_number" id="shoulder_number"
                                class="form-control {{ $errors->has('shoulder_number') ? 'border-danger' : '' }}"
                                required value="{{old('shoulder_number')}}" />
                            @if($errors->has('shoulder_number'))
                            <p class="help text-danger">
                                {{ $errors->first('shoulder_number') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="division">Division</label>
                            <select class="form-control {{ $errors->has('division') ? 'border-danger' : '' }}"
                                id="division" name="division">
                                @foreach ($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('division'))
                            <p class="help text-danger">
                                {{ $errors->first('division') }}
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ranks">Ranks</label><br>
                    <small class="text-muted">Hold 'control' to select multiple ranks</small>
                    <select class="form-control {{ $errors->has('ranks') ? 'border-danger' : '' }}" id="ranks"
                        name="ranks[]" multiple size="10">
                        @foreach ($roles as $role)
                        @if ($role->name == 'Bronze' || $role->name == 'Silver' || $role->name == 'Gold' || $role->name == 'Admin' || $role->name == 'Member')
                        @continue
                        @endif
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ranks'))
                    <p class="help text-danger">
                        {{ $errors->first('ranks') }}
                    </p>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Create <i class=" fa fa-plus"></i></button>
            </div>
        </form>
    </div>
    <div class="col"></div>
</div>
@endsection