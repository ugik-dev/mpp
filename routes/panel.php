<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\BankDataController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HeroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HeroIconController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PatnerController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login-process');
Route::middleware(['auth'])->group(function () {
    Route::get('/panel/dashboard', [DashboardController::class, 'index'])->name('panel.dashboard');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/home');
    })->name('logout');
});
Route::middleware(['auth', 'checkRole:admin,super'])->group(function () {
    Route::prefix('manage/user')->name('manage.user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::post('', [UserController::class, 'create'])->name('create');
        Route::put('', [UserController::class, 'update'])->name('update');
        Route::delete('/', [UserController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/album')->name('manage.album.')->group(function () {
        Route::get('/', [AlbumController::class, 'index'])->name('index');
        Route::post('', [AlbumController::class, 'create'])->name('create');
        Route::post('/update', [AlbumController::class, 'update'])->name('update');
        Route::delete('/', [AlbumController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/galeri')->name('manage.galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::post('', [GaleriController::class, 'create'])->name('create');
        Route::post('/update', [GaleriController::class, 'update'])->name('update');
        Route::delete('/', [GaleriController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/struktur-menu')->name('manage.menu.')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::get('/create-new', [MenuController::class, 'form'])->name('createnew');
        Route::post('store-image', [MenuController::class, 'store_media'])->name('storeimage');
        Route::get('/get', [MenuController::class, 'get'])->name('get');
        Route::post('', [MenuController::class, 'create'])->name('create');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('edit');
        Route::post('update', [MenuController::class, 'update'])->name('update');
        Route::delete('/', [MenuController::class, 'delete'])->name('delete');
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
        Route::get('/', [HeroController::class, 'index'])->name('index');
        Route::get('/search-key', [HeroController::class, 'search_key'])->name('search-key');
        Route::post('', [HeroController::class, 'create'])->name('create');
        Route::post('update', [HeroController::class, 'update'])->name('update');
        Route::delete('/', [HeroController::class, 'delete'])->name('delete');
    });

    Route::prefix('manage/agency')->name('manage.agency.')->group(function () {
        Route::get('/', [AgencyController::class, 'index'])->name('index');
        Route::post('', [AgencyController::class, 'create'])->name('create');
        Route::post('update', [AgencyController::class, 'update'])->name('update');
        Route::delete('/', [AgencyController::class, 'delete'])->name('delete');
    });


    Route::prefix('manage/bank-data')->name('manage.bank-data.')->group(function () {
        Route::get('/', [BankDataController::class, 'index'])->name('index');
        Route::post('', [BankDataController::class, 'create'])->name('create');
        Route::post('update', [BankDataController::class, 'update'])->name('update');
        Route::delete('/', [BankDataController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/patner')->name('manage.patner.')->group(function () {
        Route::get('/', [PatnerController::class, 'index'])->name('index');
        Route::post('', [PatnerController::class, 'create'])->name('create');
        Route::post('update', [PatnerController::class, 'update'])->name('update');
        Route::delete('/', [PatnerController::class, 'delete'])->name('delete');
    });
    Route::prefix('manage/hero-icon')->name('manage.hero-icon.')->group(function () {
        Route::get('/', [HeroIconController::class, 'index'])->name('index');
        Route::get('/search-key', [HeroIconController::class, 'search_key'])->name('search-key');
        Route::post('', [HeroIconController::class, 'create'])->name('create');
        Route::post('update', [HeroIconController::class, 'update'])->name('update');
        Route::delete('/', [HeroIconController::class, 'delete'])->name('delete');
    });

    Route::get('/manage/home', [ConfigController::class, 'home'])->name('manage.home');
    Route::post('/manage/home', [ConfigController::class, 'home_update'])->name('manage.home.update');

    Route::get('/manage/profile', [ConfigController::class, 'profile'])->name('manage.profile');
    Route::post('/manage/profile', [ConfigController::class, 'profile_update'])->name('manage.profile.update');

    // Rute untuk panel admin
    Route::get('/panel/users', [DashboardController::class, 'index'])->name('panel.admin.index');

    Route::get('/panel/monitoring/survey', [MonitoringController::class, 'survey'])->name('panel.monitoring.survey');
    Route::get('/panel/monitoring/pengaduan', [MonitoringController::class, 'pengaduan'])->name('panel.monitoring.pengaduan');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/check-role', function () {
        // Mengambil role dari pengguna saat ini
        $role = auth()->user()->roles->pluck('name');

        // Mengembalikan role pengguna dalam respons JSON
        return response()->json(['role' => $role]);
    });
});
