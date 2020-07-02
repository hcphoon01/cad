<?php

namespace App\Http\Controllers\Civillian;

use Carbon\Carbon;
use App\Models\FMS\CAD;
use Illuminate\Http\Request;
use App\Models\Civilian\Person;
use App\Models\Civilian\Vehicle;
use App\Http\Controllers\Controller;
use App\Models\Helper\Marker;

class CivillianController extends Controller
{
    /**
     * Return the index page
     */
    public function index()
    {
      $cads = CAD::whereDate('created_at', Carbon::today())->where('closed', 0)->get();
      $civs = Person::with('markers')->paginate(7);
      $vehicles = Vehicle::with('civ')->paginate(10);
      $markers = Marker::all();
      
      return view('civillian.index', [
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
      $person->dob = $request->dob;
      $person->address = $request->address;
      $person->aliases = $aliasesArray;
      $person->notes = $request->notes;
      $person->save();

      $person->markers()->attach($request->markers);

      return redirect()->back();
    }
}
