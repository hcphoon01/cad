<?php

namespace App\Http\Controllers\Duty;

use Carbon\Carbon;
use App\Models\FMS\Unit;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Models\User\UserData;
use App\Models\Helper\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event\EventParticipant;
use App\Rules\ValidUnit;

class DutyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $event = Event::whereDate('start_time', Carbon::today())->first();
    $eventParticipants = EventParticipant::where('event_id', $event->id)->get()->load('user.data', 'division');
    $units = Unit::all()->load('vehicle', 'callsign', 'users');
    $vehicles = Vehicle::all();

    return view('duty.index', [
      'event' => $event,
      'units' => $units,
      'eventParticipants' => $eventParticipants,
      'vehicles' => $vehicles
    ]);
  }

  /**
   * Assign a user to a unit
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function assign(Request $request)
  {
    $request->validate([
      'assign' => [new ValidUnit]
    ]);

    $userData = UserData::where('user_id', Auth::id())->first();
    $userData->unit_id = $request->assign;

    $userData->save();

    return redirect()->back();
  }

  /**
   * Create a unit
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function create(Request $request)
  {
    //
  }
}
