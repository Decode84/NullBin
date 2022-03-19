<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreNewUserRequest;

class RegistrationController extends Controller
{
    public function create()
    {
        if(Auth::check()) 
        {
            return back();
        }
        
        return view('auth.register');
    }

    public function store(StoreNewUserRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        Auth::loginUsingId($user->id);

        return redirect(route('paste.create'));
    }
}
