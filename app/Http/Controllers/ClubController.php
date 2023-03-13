<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Show the tumblers view
     */
    public function index(): View
    {
        return view('clubs', [
            'clubs' => Club::with(['city', 'country'])->get()
        ]);
    }
}

