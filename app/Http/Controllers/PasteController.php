<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paste;
use App\Models\Language;
use Illuminate\Support\Str;
use App\Http\Requests\PasteRequest;

class PasteController extends Controller
{
    public function create()
    {
        $languages = Language::query()
            ->select('id', 'name')
            ->get();

        return view('pastes.create', [
            'languages' => $languages
        ]);
    }

    public function show(Paste $paste)
    {
        if($paste->expiration <= Carbon::now())
        {
            abort(404);
        }

        // $paste->increment('visits');

        return view('pastes.show', [
            'paste' => $paste
        ]);
    }

    public function store(PasteRequest $request)
    {
        switch ($request->input('expire')) {
            case '5':
                $expiration = Carbon::now()->addMinutes(5);
                break;
            case '10':
                $expiration = Carbon::now()->addMinutes(10);
                break;
            case '30':
                $expiration = Carbon::now()->addMinutes(30);
                break;
            case '60':
                $expiration = Carbon::now()->addHour();
                break;
            case '1d':
                $expiration = Carbon::now()->addDay();
                break;
            case '1w':
                $expiration = Carbon::now()->addWeek();
                break;
        }

        $paste = Paste::create([
            'title' => $request->input('title') ?: Str::random(10),
            'author' => $request->input('author') ?: 'anon',
            'language' => $request->language,
            'expiration' => $expiration,
            'content' => $request->content,
            'created_at' => Carbon::now(),
            'url' => Str::uuid(),
        ]);

        return redirect($paste->path());
    }
}
