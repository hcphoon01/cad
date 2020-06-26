<?php

namespace App\Http\Controllers\FMS;

use App\Models\Event\Event;
use App\Models\Event\EventParticipant;
use Carbon\Carbon;
use App\Models\FMS\CAD;
use App\Models\FMS\CADRemark;
use App\Models\FMS\Unit;
use Illuminate\Http\Request;
use App\Models\FMS\Controller;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        $controller = Controller::where('user_id', Auth::user()->id)->first();
        $event = Event::whereDate('start_time', Carbon::today())->first();

        if ($controller) {
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
     * Create a CAD
     * 
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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

    /**
     * Handle adding a remark
     * 
     * @param Request $request
     */
    public function remark(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric|exists:cads,id',
            'unit' => 'required|numeric|exists:controllers,id',
            'type' => 'required|alpha',
            'remark' => 'required|alpha_dash'
        ]);

        $remark = new CADRemark();
        $remark->cad_id = $request->id;
        $remark->unit_id = $request->unit;
        $remark->type = $request->type;
        $remark->remark = $request->remark;
        $remark->save();
    }
}
