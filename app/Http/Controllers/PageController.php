<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function about()
    {
        return view('pastes.about');
    }
}
