<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
            'tweets' => $user->tweets()
                ->paginate(10),
        ]);
    }
}