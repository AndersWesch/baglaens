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
            'events' => Event::with(['city', 'country'])->orderBy('date', 'DESC')->get()
        ]);
    }

    /**
     * Show a specific event
     */
    public function show(Event $event): View
    {
        return view('event', [
            'event' => $event
        ]);
    }
}

