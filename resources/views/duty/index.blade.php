@extends('layouts.base')

@section('content')
<div class="modal fade" tabindex="-1" role="dialog" id="createUnit">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form action="{{route('duty.unit')}}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createCivLabel">Create Unit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="vehicle">Vehicle</label>
            <select class="form-control" id="vehicle" name="vehicle">
              @foreach ($vehicles as $vehicle)
              @if (!$vehicle->unit)
              <option value="{{$vehicle->id}}">{{$vehicle->model}} - {{$vehicle->vrm}}</option>
              @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="callsign">Callsign</label>
            <select class="form-control" id="callsign" name="callsign">
              @foreach ($callsigns as $callsign)
              @if (!$callsign->unit)
              <option value="{{$callsign->id}}">{{$callsign->callsign}} - {{$callsign->name}}</option>
              @endif
              @endforeach
            </select>
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
    <h1 class="text-center">Event</h1>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th scope="col">Name</th>
          <th scope="col">Description</th>
          <th scope="col">Time</th>
        </thead>
        <tbody>
          <tr>
            <td>{{$event->name}}</td>
            <td>{{$event->description}}</td>
            <td>{{$event->displayDateTime()}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row">
  <div class="col text-center">
    <div class="row">
      <div class="col">
        <h2>Booked on</h2>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th scope="col">Name</th>
              <th scope="col">Shoulder Number</th>
              <th scope="col">Division</th>
              <th scope="col">Assign</th>
              <th scope="col">Book off</th>
            </thead>
            <tbody>
              @foreach ($eventParticipants as $participant)
              @if ($participant->division_id != 8)
              <tr>
                <th scope="row">{{$participant->user->displayName()}}</th>
                <td>{{$participant->user->data->shoulder_number}}</td>
                <td>{{$participant->division->name}}</td>
                <td>
                  <form action="{{route('duty.assign')}}" method="POST">
                    @csrf
                    <input name="user_id" type="hidden" value="{{$participant->user->id}}">
                    <div class="form-group">
                      <select class="form-control" name="assign" id="assign" onchange="this.form.submit()">
                        <option value="" selected>Nothing</option>
                        @foreach ($units as $unit)
                        @if($unit->users->isEmpty())
                        <option value="{{$unit->id}}">{{$unit->callsign->callsign}} - {{$unit->vehicle->model}}
                        </option>
                        @break
                        @endif
                        @foreach ($unit->users as $user)
                        @if ($user->user_id == $participant->user->id)
                        <option value="{{$unit->id}}" selected>{{$unit->callsign->callsign}} - {{$unit->vehicle->model}}
                        </option>
                        @break
                        @else
                        <option value="{{$unit->id}}">{{$unit->callsign->callsign}} - {{$unit->vehicle->model}}</option>
                        @endif
                        @endforeach
                        @endforeach
                      </select>
                    </div>
                  </form>
                </td>
                <td>
                  <a type="button" class="btn btn-danger"
                    href="{{ route('duty.book-off', ['id'=>$participant->id])}}"><i class=" fa fa-times"></i></a>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h2>Controllers</h2>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <th scope="col">Name</th>
              <th scope="col">Shoulder Number</th>
              <th scope="col">Assign</th>
              <th scope="col">Book off</th>
            </thead>
            <tbody>
              @foreach ($eventParticipants as $participant)
              @if ($participant->division_id == 8)
              <tr>
                <th scope="row">{{$participant->user->displayName()}}</th>
                <td>{{$participant->user->data->shoulder_number}}</td>
                <td>
                  <form action="{{route('duty.assign-control')}}" method="POST">
                    @csrf
                    <input name="user_id" type="hidden" value="{{$participant->user->id}}">
                    <div class="form-group">
                      <select class="form-control" name="assign" id="assign" onchange="this.form.submit()">
                        <option value="" {!!$participant->user->controller ? '' : 'selected'!!}>Nothing</option>
                        @foreach ($controllers as $controller)
                        @if ($controller->user_id == $participant->user->id)
                        <option value="{{$controller->id}}" selected>{{$controller->callsign->callsign}} -
                            {{$controller->callsign->name}}
                          </option>
                        @endif
                        @if(!$controller->user_id)
                        <option value="{{$controller->id}}">{{$controller->callsign->callsign}} -
                          {{$controller->callsign->name}}
                        </option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </form>
                </td>
                <td>
                  <a type="button" class="btn btn-danger"
                    href="{{ route('duty.book-off', ['id'=>$participant->id])}}"><i class=" fa fa-times"></i></a>
                </td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col text-center">
    <h2>Units <a type="button" class="btn btn-success mb-2" data-toggle="modal" href="#"
        data-target="#createUnit">Create Unit
        <i class="fa fa-plus" aria-hidden="true"></i></a></h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Vehicle</th>
          <th scope="col">Callsign</th>
          <th scope="col">Users</th>
          <th scope="col">Delete</th>
        </thead>
        <tbody>
          @foreach ($units as $unit)
          <tr>
            <th scope="row">{{$unit->id}}</th>
            <td>{{$unit->vehicle->model}} - {{$unit->vehicle->vrm}}</td>
            <td>{{$unit->callsign->callsign}}</td>
            <td>
              @foreach ($unit->users as $user)
              {{ $loop->first ? '' : ', ' }}
              {{$user->user->displayName()}}
              @endforeach
            </td>
            <td>
              <a type="button" class="btn btn-danger" href="{{ route('duty.delete', ['id'=>$unit->id])}}"><i
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