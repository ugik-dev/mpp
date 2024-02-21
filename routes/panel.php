<?php

use App\Http\Controllers\ContentController;
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
        Route::get('/', [UserController::class, 'datatable'])->name('index');
        Route::post('', [UserController::class, 'create'])->name('create');
        Route::put('', [UserController::class, 'update'])->name('update');
        Route::delete('/', [UserController::class, 'delete'])->name('delete');
    });

    Route::prefix('manage/content')->name('manage.content.')->group(function () {
        Route::get('/', [ContentController::class, 'index'])->name('index');
        Route::get('add', [ContentController::class, 'form'])->name('add');
        Route::get('/preview/{slug}', [ContentController::class, 'preview'])->name('preview');
        Route::post('/create-new', [ContentController::class, 'create'])->name('create');
        Route::post('store-image', [ContentController::class, 'store_image_quill'])->name('storeimage');
        Route::get('edit/{id}', [ContentController::class, 'edit'])->name('edit');
        Route::post('/update', [ContentController::class, 'update'])->name('update');
        Route::delete('/delete', [ContentController::class, 'delete'])->name('delete');
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
