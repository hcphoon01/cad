<?php

namespace App\Http\Controllers\API\FMS;

use App\Http\Controllers\Controller;
use App\Models\Civilian\Person;
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
    // $request->validate([
    //   'search' => 'required|regex:/^[a-zA-Z ]*\\[a-zA-Z ]*\\[0-3][0-9][0-1][0-9][0-9]{4}+$/'
    // ]);

    $exploded = explode('\\', $request->search);
    $day = substr($exploded[2], 0, 2);
    $month = substr($exploded[2], 2, 2);
    $year = substr($exploded[2], 4, 4);

    $date = $day . '/' . $month . '/' . $year;

    $result = Person::where('last_name', $exploded[0])->where('first_name', $exploded[1])->where('dob', $date)->with('markers')->first();
    return $result;
  }
}
