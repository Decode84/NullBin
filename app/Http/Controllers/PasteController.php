<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paste;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\PasteRequest;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Session;

class PasteController
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
        Session::get('key');
        Session::get('decrypt');

        if($paste->expiration <= Carbon::now())
        {
            abort(404);
        }

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

        // Random generate a key
        // $key = random_bytes(32);
        $key = "FEmB3U7p9Dt2br7XqKdXU9H7cK2hAary";

        // Get the cipher
        $encrypter = new Encrypter($key, 'AES-256-CBC');

        // Encrypt the original plaintext
        $encrypted_content = $encrypter->encryptString($request->content);

        $paste = Paste::create([
            'title'             => $request->input('title') ?? Str::random(10),
            'author'            => $request->input('author') ?? 'anon',
            'language'          => $request->language,
            'expiration'        => $expiration,
            'content'           => $encrypted_content,
            'created_at'        => Carbon::now(),
            'url'               => Str::uuid(),
        ]);

        // Convert the binary into hexadecimal
        $key2 = bin2hex($key);

        // Redirect to the path with key in a session
        return redirect($paste->path())->with(['key' => $key2]);
    }

    public function decrypt(Paste $paste, Request $request)
    {
        // Get Content && Key
        $key = "FEmB3U7p9Dt2br7XqKdXU9H7cK2hAary";

        $decrypted = decrypt($request->content);

        // Return the decrypt result in the session
        return view('pastes.show', [
            'paste' => $paste
        ]);
    }
}
