<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

Route::get('/', [StatisticsController::class, 'index'])->name('statistics-page');
Route::get('/form', function () {return view('pages.form'); })->name('form-page');
Route::get('/api-page', function () {return view('pages.api-page'); })->name('api-page');

