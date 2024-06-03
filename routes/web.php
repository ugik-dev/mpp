<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SurveyController;
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

// Route::get('/', [HomeController::class, 'index'])->;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/portal', [HomeController::class, 'portal'])->name('portal');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/layanan/{slug2?}/{slug3?}', [HomeController::class, 'layanan'])->name('layanan');
Route::get('/informasi/{slug2?}/{slug3?}', [HomeController::class, 'informasi'])->name('informasi');
Route::get('/blog/{jenis}/{slug?}', [HomeController::class, 'blog'])->name('blog');
Route::get('/page/{slug1?}/{slug2?}/{slug3?}', [HomeController::class, 'menus'])->name('pages');
Route::get('/e-survey', [SurveyController::class, 'index'])->name('survey');
Route::get('/e-survey-persepsi-korupsi', [SurveyController::class, 'kpk'])->name('survey-kpk');
Route::get('/e-pengaduan', [SurveyController::class, 'pengaduan'])->name('pengaduan');
Route::get('/like-dislike', [SurveyController::class, 'like_dislike'])->name('like-dislike');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');
Route::get('/album/{album}', [HomeController::class, 'album'])->name('album');
Route::get('/bank-data', [HomeController::class, 'bank_data'])->name('bank-data');
Route::get('/bank-data/{id}', [HomeController::class, 'bank_data_download'])->name('bank-data-download');
Route::post('/e-survey', [SurveyController::class, 'post'])->name('survey-post');
Route::post('/e-survey-kpk', [SurveyController::class, 'postKpk'])->name('survey-kpk-post');
Route::post('/e-pengaduan', [SurveyController::class, 'postPengaduan'])->name('pengaduan-post');
Route::post('/e-like-dislike', [SurveyController::class, 'postLikeDislike'])->name('like-dislike-post');
Route::post('blog/{id_content}', [HomeController::class, 'blog_comment'])->name('blog-comment');
