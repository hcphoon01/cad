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
use App\Models\FMS\ControllerModel;
use App\Models\Helper\Callsign;
use App\Rules\ValidControl;
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
        $callsigns = Callsign::all();
        $controllers = ControllerModel::all()->load('callsign');

        return view('duty.index', [
            'event' => $event,
            'units' => $units,
            'eventParticipants' => $eventParticipants,
            'vehicles' => $vehicles,
            'callsigns' => $callsigns,
            'controllers' => $controllers,
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
            'assign' => [new ValidUnit],
            'user_id' => 'required|exists:users,id'
        ]);

        $userData = UserData::where('user_id', $request->user_id)->first();
        $userData->unit_id = $request->assign;

        $userData->save();

        return redirect()->back();
    }

    /**
     * Assign a user to a control position
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function assignControl(Request $request)
    {
        $request->validate([
            'assign' => [new ValidControl],
            'user_id' => 'required|exists:users,id'
        ]);

        $controllers = ControllerModel::all();
        foreach ($controllers as $controller) {
            if ($controller->user_id == $request->user_id) {
                $controller->user_id = null;
                $controller->save();
            }
        }

        if ($request->assign != null) {
            $controller = ControllerModel::find($request->assign);
            $controller->user_id = $request->user_id;
            $controller->save();
        }

        return redirect()->back();
    }

    /**
     * Create a unit
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function unit(Request $request)
    {
        $request->validate([
            'vehicle' => 'required|exists:vehicles,id',
            'callsign' => 'required|exists:callsigns,id'
        ]);

        $unit = new Unit();
        $unit->vehicle_id = $request->vehicle;
        $unit->callsign_id = $request->callsign;
        $unit->state = 7;
        $unit->assigned_cad = null;
        $unit->save();

        return redirect()->back();
    }

    /**
     * Delete a unit
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $unit = Unit::find($id);
        $unit->delete();
        return redirect()->back();
    }

    /**
     * Book off a user
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function bookOff($id)
    {
        $participant = EventParticipant::find($id);
        $participant->user->data->unit_id = null;
        $participant->user->data->save();
        $participant->delete();
        return redirect()->back();
    }
}
