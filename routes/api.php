<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureJsonApi;
use App\Http\Controllers\Api\v1\JokeController;
use App\Http\Controllers\Api\v1\VsiteursRegister;
use App\Http\Middleware\CorsMiddleware;

Route::prefix('v1')->group(function () {
    Route::post('/visiteurs-register', VsiteursRegister::class)->middleware([CorsMiddleware::class, EnsureJsonApi::class]);
    Route::get('/jokes', [JokeController::class, 'index'])->middleware([EnsureJsonApi::class]);
});