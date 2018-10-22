<?php

namespace Chatty\Http\Controllers;

use Chatty\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        // dd($username);
        $user = User::where('username', $username)->first();
        // dd($user);
        if (!$user) {
           abort(404);
        }

        return view('profile.index')->with('user', $user);
        
    }
}
