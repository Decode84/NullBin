<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Paste;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StorePasteRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DecryptPasteRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PasteController
{
    use AuthorizesRequests;

    public function index()
    {
        $pastes = Paste::query()
            ->whereVisibility('public')
            ->whereExpired()
            ->select('id', 'title', 'language', 'expiration', 'created_at', 'url', 'user_id')
            ->orderBy('id', 'desc')
            ->get();

        return view('pastes.index', [
            'pastes' => $pastes
        ]);
    }

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
        $this->authorize('view', $paste);

        // Get the comments for the paste
        $comments = $paste->comments;

        Session::get('key');

        if ($paste->expiration <= Carbon::now()) {
            abort(404);
        }

        return view('pastes.show', [
            'paste' => $paste,
            'comments' => $comments
        ]);
    }

    public function store(StorePasteRequest $request)
    {

        if ($request->input('encrypt')) {
            // Random generate a key
            $key = random_bytes(32);

            // Get the cipher
            $encrypter = new Encrypter($key, 'AES-256-CBC');

            // Encrypt the original plaintext
            $encrypted_content = $encrypter->encryptString($request->content);

            // Display the key in hexadecimal format in the session
            $key2 = bin2hex($key);

            $is_encrypted = true;
        } else {
            $encrypted_content = $request->content;
            $key2 = null;
            $is_encrypted = false;
        }

        $expiration_values = [
            '5' => Carbon::now()->addMinutes(5),
            '10' => Carbon::now()->addMinutes(10),
            '30' => Carbon::now()->addMinutes(30),
            '60' => Carbon::now()->addHour(),
            '1d' => Carbon::now()->addDay(),
            '1w' => Carbon::now()->addWeek(),
        ];

        $expiration = $expiration_values[$request->input('expire')];

        $paste = Paste::create([
            'title'             => $request->input('title') ?? Str::random(10),
            'author'            => $request->input('author') ?? 'anon',
            'language'          => $request->language,
            'expiration'        => $expiration,
            'content'           => $encrypted_content,
            'created_at'        => Carbon::now(),
            'url'               => Str::uuid(),
            'user_id'           => Auth::user()->id ?? '1', // 1 = anon account
            'visibility'        => $request->visibility,
            'is_encrypted'      => $is_encrypted,
        ]);

        // Redirect to the path with key in a session
        return redirect($paste->path())->with(['key' => $key2, 'key_displayed' => $is_encrypted]);
    }

    public function decrypt(Paste $paste, DecryptPasteRequest $request)
    {
        // Get the content
        $encrypted_content = $request->content;

        // Get key
        $key = $request->key;
        $key2 = hex2bin($key);

        // Create the encrypter
        $encrypter = new Encrypter($key2, 'AES-256-CBC');

        // Decrypt the content
        $decrypted_content = $encrypter->decryptString($encrypted_content);

        // Error validation if cannot decrypt.

        // Return the decrypt result in the session
        return Redirect::back()->with([
            'decrypt' => $decrypted_content,
        ]);
    }
}
