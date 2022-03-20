<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasteController;

// Authentication & Register
Route::get('login', [AuthenticationController::class, 'create'])->name('auth.login');
Route::post('authenticate', [AuthenticationController::class, 'store'])->name('auth.authenticate');

Route::get('register', [RegistrationController::class, 'create'])->name('auth.register');
Route::post('register', [RegistrationController::class, 'store'])->name('auth.store');

Route::post('logout', [AuthenticationController::class, 'destroy'])->name('auth.logout');


Route::get('/u/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Paste
Route::controller(PasteController::class)->group(function () {
    Route::get('/', 'create')->name('paste.create');
    Route::post('paste-store', 'store')->name('paste.store');
    Route::get('{paste}', 'show')->name('paste.show');
    Route::post('paste-decrypt', 'decrypt')->name('paste.decrypt');
});

// Generic sites
Route::get('about', [PageController::class, 'about'])->name('page.about');