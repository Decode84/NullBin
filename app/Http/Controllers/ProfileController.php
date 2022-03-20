<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paste;

class ProfileController extends Controller
{
    public function show(User $user)
    {
        $pastes = Paste::query()
            ->where('user_id', $user->id)
            ->select('id', 'title', 'language', 'expiration', 'created_at')
            ->orderBy('id', 'desc')
            ->get();

        return view('profile.show', [
            'user' => $user,
            'pastes' => $pastes
        ]);
    }
}
