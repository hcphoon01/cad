<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Helper\Vehicle;
use App\Models\FMS\CAD;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General\Announcement;

class HomeController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @returns \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::paginate(5);
        $fleetCount = Vehicle::all()->count();
        $event = Event::whereDate('start_time', Carbon::today())->first();
        $eventCount = Event::whereDate('end_time', '<', Carbon::now())->count();
        $cadCount = CAD::all()->count();

        return view('dashboard', [
            'announcements' => $announcements,
            'fleetCount' => $fleetCount,
            'event' => $event,
            'eventCount' => $eventCount,
            'cadCount' => $cadCount
        ]);
    }

    /**
     * Show the landing page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function landing()
    {
        return view('landing');
    }
}
