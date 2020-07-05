<?php

namespace App\Http\Controllers\Vehicle;

use Illuminate\Http\Request;
use App\Models\Helper\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Imports\VehicleImport;
use App\Models\Helper\Division;
use Maatwebsite\Excel\Facades\Excel;

class VehicleController extends Controller
{
  /**
   * Return the index page
   */
  public function index()
  {
    $vehicles = Vehicle::all()->load('division');
    $divisions = Division::all();

    return view('vehicle.index', [
      'vehicles' => $vehicles,
      'divisions' => $divisions,
    ]);
  }

  /**
   * Return the bulk index page
   */
  public function bulkIndex()
  {
    $divisions = Division::all();

    return view('vehicle.bulk', [
      'divisions' => $divisions,
    ]);
  }

  /**
   * Bulk import vehicles
   * @param Request $request
   */
  public function bulkImport(Request $request)
  {
    $request->validate([
      'csv_file' => 'required|mimes:csv,txt'
    ]);
    $import = new VehicleImport();
    $import->import($request->file('csv_file'));

    return redirect()->route('vehicle.index');
  }

  /**
   * Create a vehicle
   *
   * @param  VehicleRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function create(VehicleRequest $request)
  {
    $vehicle = new Vehicle();
    $vehicle->make = $request->make;
    $vehicle->model = $request->model;
    $vehicle->class = $request->class;
    $vehicle->division_id = $request->division;
    $vehicle->status = $request->status;
    $vehicle->vrm = $request->vrm;
    $vehicle->return = $request->return;
    $vehicle->save();

    return redirect()->back();
  }

  /**
   * Update a vehicle
   *
   * @param  VehicleRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function update(VehicleRequest $request, $id)
  {
    $vehicle = Vehicle::find($id);
    $vehicle->make = $request->make;
    $vehicle->model = $request->model;
    $vehicle->class = $request->class;
    $vehicle->division_id = $request->division;
    $vehicle->status = $request->status;
    $vehicle->vrm = $request->vrm;
    $vehicle->return = $request->return;
    $vehicle->save();

    return redirect()->route('vehicle.index');
  }

  /**
   * Delete a vehicle
   *
   * @param  string $id
   * @return \Illuminate\Http\Response
   */
  public function delete($id)
  {
    $vehicle = Vehicle::find($id);
    $vehicle->delete();
    return redirect()->back();
  }

  /**
   * Get vehicle details
   *
   * @param  string $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $vehicle = Vehicle::find($id);
    $divisions = Division::all();

    return view('vehicle.show', [
      'vehicle' => $vehicle,
      'divisions' => $divisions,
    ]);
  }
}
