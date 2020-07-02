@extends('layouts.base')

@section('content')
@if(session()->has('message'))
<div class="alert alert-warning alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  {{session()->get('message')}}
</div>
@endif
<div class="container">
  <div class="modal fade" tabindex="-1" role="dialog" id="createCiv">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <form action="{{route('civillian.person')}}" method="POST">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createCivLabel">Create Civ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" id="first_name" class="form-control" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" id="last_name" class="form-control" required />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="dob">Date of Birth</label>
              <input type="date" name="dob" id="dob" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <textarea type="text" name="address" id="address" class="form-control" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="aliases">Aliases (optional)</label>
              <textarea type="text" name="aliases" id="aliases" class="form-control" rows="3"
                placeholder="Enter a list of aliases, spaces will be treated as new aliases"></textarea>
            </div>
            <div class="form-group">
              <label for="markers">Markers (Hold control to select multiple)</label>
              <select class="form-control" id="markers" name="markers[]" multiple>
                @foreach ($markers as $marker)
                <option value="{{$marker->id}}">{{$marker->name}} - {{$marker->abbreviation}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="notes">Notes (optional)</label>
              <textarea type="text" name="notes" id="notes" class="form-control" rows="2"></textarea>
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
  <div class="modal fade" tabindex="-1" role="dialog" id="createVehicle">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <form action="{{route('civillian.vehicle')}}" method="POST">
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
                  <label for="vrm">VRM</label>
                  <input type="text" name="vrm" id="vrm" class="form-control" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="make">Make</label>
                  <input type="text" name="make" id="make" class="form-control" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="model">Model</label>
                  <input type="text" name="model" id="model" class="form-control" required />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="insurer">Insurer</label>
              <input type="text" name="insurer" id="insurer" class="form-control" required />
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="from">Date from</label>
                  <input type="date" name="from" id="from" class="form-control" required />
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="to">Date to</label>
                  <input type="date" name="to" id="to" class="form-control" required />
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="other_vehicles">Other Vehicles</label>
              <select class="form-control" id="other_vehicles" name="other_vehicles">
                <option value="Y" selected>Y</option>
                <option value="N">N</option>
                <option value="M">M</option>
              </select>
            </div>
            <div class="form-group">
              <label for="use">Use</label>
              <select class="form-control" id="use" name="use">
                <option value="Social, Domestic and Pleasure" selected>Social, Domestic and Pleasure</option>
                <option value="Social, Domestic, Pleasure and Commuting">Social, Domestic, Pleasure and Commuting
                </option>
                <option value="Social, Domestic, Pleasure, Commuting and Business">Social, Domestic, Pleasure, Commuting
                  and Business</option>
              </select>
            </div>
            <div class="form-group">
              <label for="permitted_drivers">Permitted Drivers (optional)</label>
              <textarea type="text" name="permitted_drivers" id="permitted_drivers" class="form-control" rows="3"
                placeholder="Enter a list of permitted drivers, commas will be treated as new drivers"></textarea>
            </div>
            <div class="form-group">
              <label for="named_drivers">Named Drivers (optional)</label>
              <textarea type="text" name="named_drivers" id="named_drivers" class="form-control" rows="3"
                placeholder="Enter a list of named drivers, commas will be treated as new drivers"></textarea>
            </div>
            <div class="form-group">
              <label for="civ">Civ</label>
              <select class="form-control" id="civ" name="civ">
                @foreach ($civs as $civ)
                <option value="{{$civ->id}}">{{$civ->first_name}} {{$civ->last_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="notes">Notes (optional)</label>
              <textarea type="text" name="notes" id="notes" class="form-control" rows="2"></textarea>
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
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="civillian-tab" data-toggle="tab" href="#civillian" role="tab"
        aria-controls="civillian" aria-selected="true">Civillian</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="vehicle-tab" data-toggle="tab" href="#vehicle" role="tab" aria-controls="vehicle"
        aria-selected="false">Vehicle</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="cad-tab" data-toggle="tab" href="#cad" role="tab" aria-controls="cad"
        aria-selected="false">CAD</a>
    </li>
  </ul>
  <div class="row mt-2">
    <div class="tab-content w-100">
      <div class="tab-pane fade show active" id="civillian" role="tabpanel" aria-labelledby="civillian-tab">
        <div class="row">
          <a type="button" class="btn btn-success mb-2" data-toggle="modal" href="#" data-target="#createCiv">Create Civ
            <i class="fa fa-plus" aria-hidden="true"></i></a>
          <div class="table-responsive">
            <table class="table table-bordered w-100">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Date of Birth</th>
                  <th scope="col">Address</th>
                  <th scope="col">Aliases</th>
                  <th scope="col">Markers</th>
                  <th scope="col">Notes</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($civs as $civ)
                <tr>
                  <th scope="row">{{$civ->id}}</th>
                  <td>{{$civ->first_name}}</td>
                  <td>{{$civ->last_name}}</td>
                  <td>{{$civ->dob}}</td>
                  <td>{{$civ->address}}</td>
                  <td>
                    @foreach ((array) $civ->aliases as $alias)
                    {{$alias}}
                    @endforeach
                  </td>
                  <td>
                    @foreach ($civ->markers as $marker)
                    {{$marker->name}}
                    @if( !$loop->last),
                    @endif
                    @endforeach
                  </td>
                  <td>{{$civ->notes}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                {{ $civs->links() }}
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
        <div class="row">
          <a type="button" class="btn btn-success mb-2" data-toggle="modal" href="#" data-target="#createVehicle">Create
            Vehicle
            <i class="fa fa-plus" aria-hidden="true"></i></a>
          <div class="table-responsive">
            <table class="table table-bordered w-100">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">VRM</th>
                  <th scope="col">Make</th>
                  <th scope="col">Model</th>
                  <th scope="col">Insurer</th>
                  <th scope="col">Policy Number</th>
                  <th scope="col">Civ</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($vehicles as $vehicle)
                <tr>
                  <th scope="row">{{$vehicle->id}}</th>
                  <td>{{$vehicle->vrm}}</td>
                  <td>{{$vehicle->make}}</td>
                  <td>{{$vehicle->model}}</td>
                  <td>{{$vehicle->insurer}}</td>
                  <td>{{$vehicle->policy_number}}</td>
                  <td>{{$vehicle->civ->first_name}} {{$vehicle->civ->last_name}}</td>
                </tr>
                @endforeach
              </tbody>
              <tfoot>
                {{ $vehicles->links() }}
              </tfoot>
            </table>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cad" role="tabpanel" aria-labelledby="cad-tab">...</div>
    </div>
  </div>
</div>
@endsection