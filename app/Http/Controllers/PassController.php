<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pass;

class PassController extends Controller
{
    /**
     * Show the tumblers view
     */
    public function index(): View
    {
        return view('passes', [
            'passes' => Pass::all()
        ]);
    }
}
