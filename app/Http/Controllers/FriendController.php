<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }

    public function getAdd($username)
    {
        // dd($username);
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found');
        }

        // Проверяем, был ли ранее отправлен запрос на добавление в друзья
        if (Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user())) {
            return redirect()
                ->route('profile', ['username' => $user->username])
                ->with('info', 'Friend request already pending.');
        }
        
        // Проверяем, мы уже друзья?
        if (Auth::user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile', ['username' => $user->username])
                ->with('info', 'You are already friends.');
        }

        Auth::user()->addFriend($user);

        return  redirect()
                ->route('profile', ['username' => $user->username])
                ->with('info', 'Friend request sent.');
    }
}
