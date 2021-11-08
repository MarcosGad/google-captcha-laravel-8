<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CaptchaController;

// captcha routes
Route::get('form', [CaptchaController::class, 'form'])->name('form');
Route::post('form-submit', [CaptchaController::class, 'submit'])->name('submit');
