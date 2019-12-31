<?php

namespace App\Http\Controllers\Home;

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
        return view('dashboard', [
            'announcements' => $announcements
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
