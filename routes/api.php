<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureJsonApi;
use App\Http\Controllers\Api\v1\JokeController;
use App\Http\Controllers\Api\v1\VsiteursRegister;
use App\Http\Middleware\CorsMiddleware;

Route::middleware(['api', EnsureJsonApi::class])->prefix('v1')->group(function () {
    Route::get('/jokes', [JokeController::class, 'index']);
    Route::post('/visiteurs-register', VsiteursRegister::class)->middleware(CorsMiddleware::class);
});