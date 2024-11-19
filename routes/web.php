<?php

use App\Http\Controllers\LuckyController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SpecialPageController;

Route::get('/', [RegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [RegistrationController::class, 'register'])->name('register');

Route::get('/link-expired', function () {
    return view('link_expired');
})->name('link.expired');

Route::middleware(\App\Http\Middleware\CheckActiveLink::class)->group(function () {
    Route::get('/special/{token}', [SpecialPageController::class, 'show'])->name('special.page');
    Route::post('/special/{token}/generate-new-link', [SpecialPageController::class, 'generateNewLink'])->name('generate.new.link');
    Route::post('/special/{token}/deactivate-link', [SpecialPageController::class, 'deactivateLink'])->name('deactivate.link');
    Route::get('/special/{token}/imfeelinglucky', [LuckyController::class, 'imFeelingLucky'])->name('imfeelinglucky');
    Route::get('/special/{token}/history', [LuckyController::class, 'history'])->name('history');
});



