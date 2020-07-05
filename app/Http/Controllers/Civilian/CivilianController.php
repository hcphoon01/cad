<?php

namespace App\Http\Controllers\Civilian;

use App\Events\CADCreated;
use Carbon\Carbon;
use App\Models\FMS\CAD;
use Illuminate\Http\Request;
use App\Models\Helper\Marker;
use App\Models\Civilian\Person;
use Illuminate\Validation\Rule;
use App\Models\Civilian\Vehicle;
use App\Http\Controllers\Controller;

class CivilianController extends Controller
{
  /**
   * Return the index page
   */
  public function index()
  {
    $cads = CAD::whereDate('created_at', Carbon::today())->where('closed', 0)->paginate(5);
    $civs = Person::with('markers')->paginate(5);
    $vehicles = Vehicle::with('civ')->paginate(7);
    $markers = Marker::all();

    return view('civilian.index', [
      'cads' => $cads,
      'civs' => $civs,
      'vehicles' => $vehicles,
      'markers' => $markers
    ]);
  }

  /**
   * Create a new civ
   * 
   * @param Request $request
   */
  public function person(Request $request)
  {
    $request->validate([
      'first_name' => 'required|alpha_dash',
      'last_name' => 'required|alpha_dash',
      'dob' => 'required|date',
      'address' => 'required',
      'aliases' => 'required',
      'markers.*' => 'required|exists:markers,id',
      'notes' => 'required'
    ]);

    $aliasesArray = explode(' ', $request->aliases);

    $person = new Person();
    $person->first_name = $request->first_name;
    $person->last_name = $request->last_name;
    $person->dob = date('d/m/Y', strtotime($request->dob));
    $person->address = $request->address;
    $person->aliases = $aliasesArray;
    $person->notes = $request->notes;
    $person->save();

    $person->markers()->attach($request->markers);

    return redirect()->back();
  }

  /**
   * Create a new vehicle
   * 
   * @param Request $request
   */
  public function vehicle(Request $request)
  {
    $request->validate([
      'vrm' => 'required',
      'make' => 'required|alpha_num',
      'model' => 'required|alpha_num',
      'insurer' => 'required|alpha_num',
      'from' => 'required|date',
      'to' => 'required|date',
      'other_vehicles' => [
        'required',
        Rule::in(['Y', 'N', 'M'])
      ],
      'use' => [
        'required',
        Rule::in([
          'Social, Domestic and Pleasure',
          'Social, Domestic, Pleasure and Commuting',
          'Social, Domestic, Pleasure, Commuting and Business'
        ])
      ],
      'permitted_drivers' => 'present',
      'named_drivers' => 'present',
      'civ' => 'required|exists:people,id',
    ]);

    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numbers = '0123456789';
    $policyNumber = substr(str_shuffle($letters), 0, 3) . substr(str_shuffle($numbers), 0, 9);

    $vehicle = new Vehicle();
    $vehicle->vrm = $request->vrm;
    $vehicle->make = $request->make;
    $vehicle->model = $request->model;
    $vehicle->insurer = $request->insurer;
    $vehicle->policy_number = $policyNumber;
    $vehicle->from = date('d/m/Y', strtotime($request->from));
    $vehicle->to = date('d/m/Y', strtotime($request->to));
    $vehicle->other_vehicles = $request->other_vehicles;
    $vehicle->civ_id = $request->civ;
    $vehicle->permitted_drivers = $request->permitted_drivers;
    $vehicle->use = $request->use;
    $vehicle->named_drivers = explode(',', $request->named_drivers);
    $vehicle->save();

    return redirect()->back();
  }

  /**
   * Create a new CAD
   * 
   * @param Request $request
   */
  public function cad(Request $request)
  {
    $cadNumber = 1;
    $request->validate([
      'caller_name' => 'required|regex:/^[a-zA-Z\s]*$/',
      'description' => 'required|regex:/^[a-zA-Z\s]*$/',
      'location' => 'required|regex:/^[a-zA-Z\s]*$/',
      'telephone' => 'required',
      'response_level' => [
        'required',
        Rule::in(['Immediate', 'Standard'])
      ],
      'cad_vrm' => 'required|regex:/[a-zA-Z0-9\s]+/',
    ]);

    $latestCad = CAD::orderBy('id', 'desc')->first();
    if ($latestCad->created_at->isToday()) {
      $cadNumber = $latestCad->cad_number + 1;
    }
    $displayName = str_pad($cadNumber, 5, "0", STR_PAD_LEFT) . '/' . strtoupper(Carbon::now()->format('dMy'));
    
    $cad = new CAD();
    $cad->caller_name = $request->caller_name;
    $cad->location = $request->location;
    $cad->telephone = $request->telephone;
    $cad->response_level = $request->response_level;
    $cad->vrm = $request->cad_vrm;
    $cad->description = $request->description;
    $cad->cad_number = $cadNumber;
    $cad->display_name = $displayName;
    $cad->save();
    event(new CADCreated($cad));

    return redirect()->back();
  }
}
