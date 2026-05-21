<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

Route::get('/', [StatisticsController::class, 'index'])->name('statistics.index');

Route::get('/form', function () {
    return view('pages.form');
});

