<?php

use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\ProfileController;

// Paste
Route::controller(PasteController::class)->group(function () {
    Route::get('/', 'create')->name('paste.create');
    Route::post('paste-store', 'store')->name('paste.store');
    Route::get('{paste}', 'show')->name('paste.show');
    Route::post('paste-decrypt', 'decrypt')->name('paste.decrypt');
});

// Authentication & Register
Route::get('authenticate', [AuthenticateController::class, 'create'])->name('auth.login');
Route::post('authenticate', [AuthenticateController::class, 'store'])->name('auth.authenticate');

Route::get('register', [RegistrationController::class, 'create'])->name('auth.register');
Route::post('register', [RegistrationController::class, 'store'])->name('auth.store');

Route::post('logout', [AuthenticateController::class, 'destroy'])->name('auth.logout');

// Generic sites
Route::get('about', [PageController::class, 'about'])->name('page.about');