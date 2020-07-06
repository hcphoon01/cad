@extends('layouts.base')

@section('header')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
@endsection

@section('content')
<div class="row">
  <div class="col text-center">
    <h3>User Management</h3>
    <div class="table-responsive">
      <table class="table table-bordered" id="users">
        <thead>
          <th scope="col">#</th>
          <th scope="col">Full Name</th>
          <th scope="col">Shoulder Number</th>
          <th scope="col">Division</th>
          <th scope="col">Last Patrol</th>
          <th scope="col">Email Address</th>
          <th scope="col">Edit</th>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->data->shoulder_number ? $user->data->shoulder_number : ''}}</td>
            <td>{{$user->data->division ? $user->data->division->name : ''}}</td>
            @if ($user->data->lastPatrol)
            <td>{{$user->data->lastPatrol->start_time->format('d/m/Y')}}</td>
            @else
            <td><span class="badge badge-danger">No Patrols Attended</span></td>
            @endif
            <td>{{$user->email}}</td>
            <td>
            <a type="button" class="btn btn-success" href="{{route('users.show', ['id' => $user->id])}}"><i class=" fa fa-pencil"></i></a>
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
  $(document).ready(function() {
  $('#users').DataTable();
})
</script>
@endsection