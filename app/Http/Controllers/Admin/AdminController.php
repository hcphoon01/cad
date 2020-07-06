<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
  /**
   * Edit an event
   */
  public function event(Request $request, $id)
  {
    $event = Event::find($id);
    $event->name = $request->name;
    $event->description = $request->description;
    $event->start_time = date('Y-m-d H:i:s', strtotime($request->start_time));
    $event->end_time = date('Y-m-d H:i:s', strtotime($request->end_time));
    $event->max_participants = $request->max_participants;
    
    $event->save();

    return redirect()->back();
  }
}
