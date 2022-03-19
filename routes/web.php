<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasteController;

Route::get('about', [PageController::class, 'about'])->name('page.about');

Route::controller(PasteController::class)->group(function () {
    Route::get('/', 'create')->name('paste.create');
    Route::post('paste-store', 'store')->name('paste.store');
    Route::get('{paste}', 'show')->name('paste.show');
    Route::post('paste-decrypt', 'decrypt')->name('paste.decrypt');
});
