<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::middleware(['auth', 'cekRole:Admin'])->group(function () {
});
