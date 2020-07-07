@extends('layouts.base')

@section('content')
<div class="row">
  <div class="col"></div>
  <div class="col text-center">
    <h2>Update User</h2>
    <form action="{{route('users.update', ['id' => $user->id])}}" method="POST">
      @csrf
      <div class="form-group">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name"
            class="form-control {{ $errors->has('name') ? 'border-danger' : '' }}" required value="{{$user->name}}" />
          @if($errors->has('name'))
          <p class="help text-danger">
            {{ $errors->first('name') }}
          </p>
          @endif
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" name="email" id="email"
            class="form-control {{ $errors->has('email') ? 'border-danger' : '' }}" required value="{{$user->email}}" />
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
                class="form-control {{ $errors->has('shoulder_number') ? 'border-danger' : '' }}" required
                value="{{$user->data ? $user->data->shoulder_number : ''}}" />
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
              <select class="form-control {{ $errors->has('division') ? 'border-danger' : '' }}" id="division"
                name="division">
                @foreach ($divisions as $division)
                @if ($user->data && $user->data->division_id == $division->id)
                <option value="{{$division->id}}" selected>{{$division->name}}</option>
                @else
                <option value="{{$division->id}}">{{$division->name}}</option>
                @endif
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
            @if (!$user->can('add bronze') && $role->name == 'Bronze')
            @continue
            @endif
            @if (!$user->can('add silver') && $role->name == 'Silver')
            @continue
            @endif
            @if (!$user->can('add gold') && $role->name == 'Gold')
            @continue
            @endif
            @if ($user->roles->contains('id', $role->id))
            <option value="{{$role->id}}" selected>{{$role->name}}</option>
            @else
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endif
            @endforeach
          </select>
          @if($errors->has('ranks'))
          <p class="help text-danger">
            {{ $errors->first('ranks') }}
          </p>
          @endif
        </div>
        <button type="submit" class="btn btn-success">Update <i class=" fa fa-pencil"></i></button>
      </div>
    </form>
  </div>
  <div class="col"></div>
</div>
@endsection