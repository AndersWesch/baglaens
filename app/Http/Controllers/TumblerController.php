<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Tumbler;

class TumblerController extends Controller
{
    /**
     * Show the tumblers view
     */
    public function index(): View
    {
        return view('tumblers', [
            'tumblers' => Tumbler::orderBy('first_name')->get()
        ]);
    }

    /**
     * Show a specific tumbler
     */
    public function show(Tumbler $tumbler): View
    {
        return view('tumbler', [
            'tumbler' => $tumbler
        ]);
    }
}
