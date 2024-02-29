<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/panel.php';

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'portal'])->name('portal');
Route::get('/layanan/{slug2?}/{slug3?}', [HomeController::class, 'layanan'])->name('layanan');
Route::get('/informasi/{slug2?}/{slug3?}', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/page/{slug1?}/{slug2?}/{slug3?}', [HomeController::class, 'menus'])->name('pages');
