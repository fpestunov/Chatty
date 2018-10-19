<?php

namespace Chatty\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Chatty\User;
use Auth;
class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
        // dd('Sign up ok');
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'username' => 'required|alpha_dash|max:20',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('home')->with('info', 'Your account has been created and you can sign in');

    }

    public function getSignin()
    {
        return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        // dd('Sign In ok');

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('info', 'Could not sign you in with those details.');
        }

        return redirect()->route('home')->with('info', 'You are now signed in.');
    }
}