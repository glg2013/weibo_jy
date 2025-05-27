<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // 关注
    public function store(User $user)
    {
        $this->authorize('follow', $user);

        if (!Auth::user()->isFollowing($user->getAttributeValue('id'))) {
            Auth::user()->follow($user->getAttributeValue('id'));
        }

        return redirect()->route('users.show', $user->getAttribute('id'));
    }

    // 取关
    public function destroy(User $user)
    {
        $this->authorize('follow', $user);

        if (Auth::user()->isFollowing($user->getAttributeValue('id'))) {
            Auth::user()->unfollow($user->getAttributeValue('id'));
        }

        return redirect()->route('users.show', $user->getAttribute('id'));
    }
}
