<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Club;

class ClubController extends Controller
{
    /**
     * Show the clubs view
     */
    public function index(): View
    {
        return view('clubs', [
            'clubs' => Club::with(['city', 'country'])->get()
        ]);
    }

    /**
     * Show the a specific club
     */
    public function show(Club $club): View
    {
        return view('club', [
            'club' => $club
        ]);
    }
}

