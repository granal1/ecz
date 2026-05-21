<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\RegisterController;


Auth::routes();
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register-user', [RegisterController::class, 'newUser'])->name('register.new-user');

Route::middleware(['auth'])->group(function () {
    Route::get('/', [StatisticsController::class, 'index'])->name('statistics-page');
    Route::get('/form', function () {return view('pages.form'); })->name('form-page');
    Route::get('/api-page', function () {return view('pages.api-page'); })->name('api-page');
});
