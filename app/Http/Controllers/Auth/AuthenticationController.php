<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    public function create()
    {
        if(Auth::check()) 
        {
            return back();
        }

        return view('auth.login'); 
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            return redirect()->intended('paste.create');
        }

        return back();
    }

    public function destory(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken()();
        return redirect('paste.create');
    }
}
