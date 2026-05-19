<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureJsonApi;
use App\Http\Controllers\Api\v1\JokeController;

Route::middleware(['api', EnsureJsonApi::class])->prefix('v1')->group(function () {
    Route::get('/jokes', [JokeController::class, 'index']);
});