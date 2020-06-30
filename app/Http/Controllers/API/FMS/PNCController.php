<?php

namespace App\Http\Controllers\API\FMS;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Person;
use App\Models\Civilian\Vehicle;
use Illuminate\Http\Request;

class PNCController extends Controller
{
  /**
   * Return PNC results for a person
   * 
   * @param Request $request
   */
  public function person(Request $request)
  {
    $request->validate([
      'search' => 'required'
    ]);

    $exploded = explode('\\', $request->search);
    $day = substr($exploded[2], 0, 2);
    $month = substr($exploded[2], 2, 2);
    $year = substr($exploded[2], 4, 4);

    $date = $day . '/' . $month . '/' . $year;

    return Person::where('last_name', $exploded[0])->where('first_name', $exploded[1])->where('dob', $date)->with('markers')->first();
  }

  /**
   * Return PNC results for a vehicle
   * 
   * @param Request $request
   */
  public function vehicle(Request $request)
  {
    $request->validate([
      'search' => 'required'
    ]);

    return Vehicle::where('vrm', $request->search)->with('civ')->first();
  }
}
