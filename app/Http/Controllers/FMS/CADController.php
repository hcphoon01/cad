<?php

namespace App\Http\Controllers\FMS;

use Carbon\Carbon;
use App\Models\FMS\CAD;
use App\Models\FMS\Unit;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Models\FMS\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Event\EventParticipant;

class CADController extends Controller
{
    /**
     * Book on a user
     * 
     * @param Request $request
     */
    public function bookOn(Request $request)
    {
        $request->validate([
            'division' => 'required|numeric|exists:divisions,id',
            'event' => 'required|numeric|exists:events,id',
        ]);

        $eventParticipant = new EventParticipant();
        $eventParticipant->user_id = Auth::user()->id;
        $eventParticipant->division_id = $request->division;
        $eventParticipant->event_id = $request->event;
        $eventParticipant->save();

        return redirect()->back();
    }

    /**
     * Return CAD landing page
     */
    public function index(Request $request)
    {
        $controller = Controller::where('user_id', Auth::user()->id)->first();
        $unit = Unit::whereHas('users', function($q) {
          $q->where('user_id', Auth::id());
        })->first();
        $event = Event::whereDate('start_time', Carbon::today())->first();

        if ($controller && strpos($request->url(), '/cad')) {
            return view('fms.app');
        } if ($unit && strpos($request->url(), '/mdt')) {
          return view('fms.app');
        } elseif (!$event) {
            return view('fms.app');
        } elseif ($event->isParticipant(Auth::user())) {
            return redirect()->back()->with('message', 'You have not been assigned a position, please contact your chain of command');
        } else {
            return redirect()->back()->with('message', 'You are not booked on for this patrol. Please book on before proceeding.');
        }
    }

    /**
     * Return all the information for the CAD display
     */
    public function show()
    {
        $cads = CAD::whereDate('created_at', Carbon::today())->with('units.callsign', 'remarks.unit.callsign')->get();
        $units = Unit::all()->load('users.user.qualifications', 'vehicle', 'callsign');
        $controller = Controller::where('user_id', Auth::user()->id)->first()->load('user', 'callsign');

        return [
            'cads' => $cads,
            'units' => $units,
            'controller' => $controller
        ];
    }

    /**
     * Return a cad
     */
    public function getCad($id = null)
    {
        if ($id) {
            $cad = CAD::with('units.callsign', 'remarks.unit.callsign')->find($id);
        } else {
            $cad = CAD::whereDate('created_at', Carbon::today())->firstOrFail()->load('units.callsign', 'remarks.unit.callsign');
        }

        return $cad;
    }
}
