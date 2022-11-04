<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function followings(User $user)
    {
        return view('tweets.followings', ['user' => $user]);
    }

    public function followers(User $user)
    {
        return view('tweets.followers', ['user' => $user]);
    }

    public function followingUser()
    {
        $users = User::where('id', '!=', auth()->user()->id)->orderBy('username')->get();

        return view('tweets.following', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $user = User::find($request->id);
        $followed = auth()->user()->followingExists($user);
        $message = $followed ? 'You are already Following @' . $user->username : 'You are Following @' . $user->username;

        if (!$followed) auth()->user()->follow($user);

        if ($followed) {
            return redirect()->back()->with('message', $message);
        } else {
            return redirect()->route('users.show', [$user])->with('message', $message);
        }
    }
}