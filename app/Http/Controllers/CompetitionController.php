<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Competition;

class CompetitionController extends Controller
{
    /**
     * Show a specific event
     */
    public function show(Competition $competition): View
    {
        return view('competition', [
            'competition' => $competition
        ]);
    }
}
