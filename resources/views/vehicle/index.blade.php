@extends('layouts.base')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<div class="modal fade" tabindex="-1" role="dialog" id="createVehicle">
  <div class="modal-dialog" role="document">
    <form action="{{route('vehicle.create')}}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCivLabel">Create Vehicle</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="make">Make</label>
                <input type="text" name="make" id="make"
                  class="form-control {{ $errors->has('make') ? 'border-danger' : '' }}" required placeholder="Ford"
                  value="{{old('make')}}" />
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
                  value="{{old('model')}}" />
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
              required value="{{old('vrm')}}" />
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
              value="{{old('class')}}" />
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
              <option value="{{$division->id}}">{{$division->name}}</option>
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
            <select name="status" id="status"
              class="form-control  {{ $errors->has('division') ? 'border-danger' : '' }}">
              <option value="1" selected>In Service</option>
              <option value="0">Out of Service</option>
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
              class="form-control  {{ $errors->has('return') ? 'border-danger' : '' }}" value="{{old('return')}}" />
            @if($errors->has('return'))
            <p class="help text-danger">
              {{ $errors->first('return') }}
            </p>
            @endif
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Create</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col text-center">
    <h3>Vehicle Maintenance</h3>
    <a type="button" class="btn btn-success mb-2" data-toggle="modal" href="#" data-target="#createVehicle">Create
      Vehicle <i class="fa fa-plus" aria-hidden="true"></i></a>
    <a type="button" class="btn btn-success mb-2" href="{{route('vehicle.bulk.index')}}">Bulk Create Vehicle
      <i class="fa fa-plus" aria-hidden="true"></i></a>
    <div class="table-responsive">
      <table class="table table-bordered" id="vehicle">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Make</th>
          <th scope="col">Model</th>
          <th scope="col">Class</th>
          <th scope="col">VRM</th>
          <th scope="col">Division</th>
          <th scope="col">Status</th>
          <th scope="col">Return Date</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </thead>
        <tbody>
          @foreach ($vehicles as $vehicle)
          <tr>
            <th scope="row">{{$vehicle->id}}</th>
            <td>{{$vehicle->make}}</td>
            <td>{{$vehicle->model}}</td>
            <td>{{$vehicle->class}}</td>
            <td>{{$vehicle->vrm}}</td>
            <td>{{$vehicle->division->name}}</td>
            @if ($vehicle->status)
            <td>
              <h5><span class="badge badge-success">In Service</span></h5>
            </td>
            @else
            <td>
              <h5><span class="badge badge-danger">Out of Service</span></h5>
            </td>
            @endif
            <td>{{$vehicle->return ? $vehicle->return->format('d/m/Y') : ''}}</td>
            <td>
              <a type="button" class="btn btn-success" href="{{ route('vehicle.show', ['id'=>$vehicle->id])}}"><i
                  class=" fa fa-pencil"></i></a>
            </td>
            <td>
              <a type="button" class="btn btn-danger" href="{{ route('vehicle.delete', ['id'=>$vehicle->id])}}"><i
                  class=" fa fa-times"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
@if (count($errors) > 0)
    $('#createVehicle').modal('show');
@endif
$(document).ready(function() {
  $('#vehicle').DataTable();
})
</script>
@endsection