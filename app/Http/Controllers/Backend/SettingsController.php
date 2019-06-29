<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function removeAdmin(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->isAdmin = 0;
        $user->save();

        Session::flash('removeAdminSuccess', 'User '.$user->id.' is no longer an admin.');

        return redirect()->route('backend.settings');
    }

    public function addAdmin(Request $request, $id)
    {
    }
}
