<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Event;

class EventController extends Controller
{
    /**
     * Show the tumblers view
     */
    public function index(): View
    {
        return view('events', [
            'events' => Event::all()
        ]);
    }
}
