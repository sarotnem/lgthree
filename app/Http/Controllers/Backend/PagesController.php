<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }
}
