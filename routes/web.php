<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\ProfileController;

// Authentication & Register
Route::get('login', [AuthenticationController::class, 'create'])->name('auth.login');
Route::post('authenticate', [AuthenticationController::class, 'store'])->name('auth.authenticate');

Route::get('register', [RegistrationController::class, 'create'])->name('auth.register');
Route::post('register', [RegistrationController::class, 'store'])->name('auth.store');

Route::post('logout', [AuthenticationController::class, 'destroy'])->name('auth.logout');

Route::get('/public', [PasteController::class, 'index'])->name('paste.index');

Route::get('/u/{user}', [ProfileController::class, 'show'])->name('profile.show');

// Generic sites
Route::get('about', [PageController::class, 'about'])->name('page.about');

Route::controller(CommentController::class)->group(function () {
    Route::post('comments', 'CommentController@store');
});

// Paste
Route::controller(PasteController::class)->group(function () {
    Route::get('/', 'create')->name('paste.create');
    Route::post('paste-store', 'store')->name('paste.store');
    Route::get('{paste}', 'show')->name('paste.show');
    Route::post('paste-decrypt', 'decrypt')->name('paste.decrypt');
});