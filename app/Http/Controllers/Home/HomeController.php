<?php

namespace App\Http\Controllers\Home;

use Carbon\Carbon;
use App\Models\FMS\CAD;
use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Models\Helper\Vehicle;
use App\Models\Helper\Division;
use App\Http\Controllers\Controller;
use App\Models\Event\EventParticipant;
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
        $eventCount = Event::whereDate('end_time', '<', Carbon::now())->count();
        $cadCount = CAD::all()->count();

        $event = Event::whereDate('start_time', Carbon::today())->first();
        if ($event) {
            $eventParticipants = EventParticipant::where('event_id', $event->id)->get();
        };

        $eventParticipants = [];
        $participantCount = [];

        foreach ($eventParticipants as $participant) {
            if (isset($participantCount[$participant->division_id])) {
                $participantCount[$participant->division_id] += 1;
            } else {
                $participantCount[$participant->division_id] = 1;
            }
            
        }
        
        ksort($participantCount);

        $divisions = Division::all();

        return view('dashboard', [
            'announcements' => $announcements,
            'fleetCount' => $fleetCount,
            'eventCount' => $eventCount,
            'cadCount' => $cadCount,
            'event' => $event,
            'eventParticipants' => $eventParticipants,
            'participantCount' => $participantCount,
            'divisions' => $divisions
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
