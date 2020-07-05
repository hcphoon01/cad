@extends('layouts.base')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="row">
  <div class="col text-center">
    <h3>Bulk Vehicle Import</h3>

    <h4>The file must be a .csv file and must be in the following format:</h4>
    <h4>
      Class, Make, Model, VRM, Division
    </h4>

    <p>For example:<br>
      <br>
      Class, Make, Model, VRM, Division,<br>
      ARV, BMW, X5, AB12 CDE, 4<br>
      Marked IRV, Vauxhall, Astra, AB13 CDE, 1<br>
    </p>

    <form class="form-horizontal" method="POST" action="{{ route('vehicle.bulk.import') }}"
      enctype="multipart/form-data">
      {{ csrf_field() }}

      <div class="form-group{{ $errors->has('csv_file') ? ' has-error' : '' }}">
        <label for="csv_file">CSV file to import</label>

        <div class="col">
          <input id="csv_file" type="file" class="form-control" name="csv_file" required>

          @if ($errors->has('csv_file'))
          <span class="help-block">
            <strong>{{ $errors->first('csv_file') }}</strong>
          </span>
          @endif
        </div>
      </div>

      <div class="form-group">
        <div class="col">
          <button type="submit" class="btn btn-primary">
            Upload CSV
          </button>
        </div>
      </div>
    </form>
    <h4>
      Division List: <br>
      ID - Name <br>
    </h4>
    <p>
      @foreach ($divisions as $division)
      {{$division->id}} - {{$division->name}} <br>
      @endforeach
    </p>
  </div>
</div>
@endsection