<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-process');
Route::middleware(['auth'])->group(function () {
    Route::get('/panel/dashboard', [DashboardController::class, 'index'])->name('panel.dashboard');
});
Route::middleware(['auth', 'checkRole:admin,super'])->group(function () {
    Route::prefix('manage/user')->name('manage.user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/hero')->name('manage.hero.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        // Route::post('/create', [UserController::class, 'create'])->name('create');
        // Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        // Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        // Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('delete');
    });
    // Rute untuk panel admin
    Route::get('/panel/users', [DashboardController::class, 'index'])->name('panel.admin.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/check-role', function () {
        // Mengambil role dari pengguna saat ini
        $role = auth()->user()->roles->pluck('name');

        // Mengembalikan role pengguna dalam respons JSON
        return response()->json(['role' => $role]);
    });
});
