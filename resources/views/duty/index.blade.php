@extends('layouts.base')

@section('content')
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
    <h2>Booked on</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <th scope="col">Name</th>
          <th scope="col">Shoulder Number</th>
          <th scope="col">Division</th>
          <th scope="col">Assign</th>
        </thead>
        <tbody>
          @foreach ($eventParticipants as $participant)
          <tr>
            <th scope="row">{{$participant->user->displayName()}}</th>
            <td>{{$participant->user->data->shoulder_number}}</td>
            <td>{{$participant->division->name}}</td>
            <td>
              <form action="{{route('duty.assign')}}" method="POST">
                @csrf
                <div class="form-group">
                  <select class="form-control" name="assign" id="assign" onchange="this.form.submit()">
                    <option value="" selected>Nothing</option>
                    @foreach ($units as $unit)
                      @foreach ($unit->users as $user)
                        @if ($user->user_id == Auth::id())
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
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="col text-center">
    <h2>Units</h2>
  </div>
</div>
@endsection