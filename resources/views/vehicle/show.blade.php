@extends('layouts.base')

@section('content')
<div class="row">
  <div class="col"></div>
  <div class="col text-center">
    <h2>Update Vehicle</h2>
    <form action="{{route('vehicle.update', ['id' => $vehicle->id])}}" method="POST" id="vehicle">
      @csrf
      <div class="form-group">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="make">Make</label>
              <input type="text" name="make" id="make"
                class="form-control {{ $errors->has('make') ? 'border-danger' : '' }}" required placeholder="Ford"
                value="{{$vehicle->make}}" />
              @if($errors->has('make'))
              <p class="help text-danger">
                {{ $errors->first('make') }}
              </p>
              @endif
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="model">Model</label>
              <input type="text" name="model" id="model"
                class="form-control {{ $errors->has('model') ? 'border-danger' : '' }}" required placeholder="Focus"
                value="{{$vehicle->model}}" />
              @if($errors->has('model'))
              <p class="help text-danger">
                {{ $errors->first('model') }}
              </p>
              @endif
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="vrm">VRM</label>
          <input type="text" name="vrm" id="vrm" class="form-control {{ $errors->has('vrm') ? 'border-danger' : '' }}"
            required value="{{$vehicle->vrm}}" />
          @if($errors->has('vrm'))
          <p class="help text-danger">
            {{ $errors->first('vrm') }}
          </p>
          @endif
        </div>
        <div class="form-group">
          <label for="class">Class</label>
          <input type="text" name="class" id="class"
            class="form-control {{ $errors->has('class') ? 'border-danger' : '' }}" required placeholder="Marked IRV"
            value="{{$vehicle->class}}" />
          @if($errors->has('class'))
          <p class="help text-danger">
            {{ $errors->first('class') }}
          </p>
          @endif
        </div>
        <div class="form-group">
          <label for="division">Division</label>
          <select class="form-control {{ $errors->has('division') ? 'border-danger' : '' }}" id="division"
            name="division">
            @foreach ($divisions as $division)
            @if ($vehicle->division_id == $division->id)
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
        <div class="form-group">
          <label for="status">Status</label>
          <select name="status" id="status" class="form-control  {{ $errors->has('division') ? 'border-danger' : '' }}">
            <option value="1" {{$vehicle->status ? 'selected' : ''}}>In Service</option>
            <option value="0" {{!$vehicle->status ? 'selected' : ''}}>Out of Service</option>
          </select>
          @if($errors->has('status'))
          <p class="help text-danger">
            {{ $errors->first('status') }}
          </p>
          @endif
        </div>
        <div class="form-group">
          <label for="return">Return Date</label>
          <input type="date" name="return" id="return"
            class="form-control  {{ $errors->has('return') ? 'border-danger' : '' }}"
            value="{{$vehicle->return ? $vehicle->return->format('Y-m-d') : ''}}" />
          @if($errors->has('return'))
          <p class="help text-danger">
            {{ $errors->first('return') }}
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
