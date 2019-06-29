<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Airport;

class PagesController extends Controller
{
    public function home()
    {
        $airports = Airport::orderBy('icao', 'asc')->get();

        return view('frontend.pages.home', compact('airports'));
    }
}
