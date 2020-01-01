<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\General\Announcement;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    /**
     * Create an announcement.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $announcement = new Announcement();
        $announcement->title = $request->title;
        $announcement->body = $request->body;
        $announcement->posted_by = Auth::user()->id;
        $announcement->save();

        return redirect()->back();
    }
    
    /**
     * Remove the specified announcement.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        // delete
        $nerd = Announcement::find($id);
        $nerd->delete();

        // redirect
        return redirect()->back();
    }
}
