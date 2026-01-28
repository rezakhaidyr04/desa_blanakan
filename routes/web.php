<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\OfficialController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\Admin\PotentialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AuthController as UserAuthController;
use App\Http\Controllers\UserSettingController;

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

Route::controller(App\Http\Controllers\PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/profil', 'profil')->name('profil');
    Route::get('/potensi', 'potensi')->name('potensi');
    Route::get('/layanan', 'layanan')->name('layanan');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita/{slug}', 'beritaDetail')->name('berita.detail');
    Route::get('/galeri', 'galeri')->name('galeri');
    Route::get('/kontak', 'kontak')->name('kontak');
    
    // Prosedur Layanan
    Route::get('/prosedur', 'prosedurIndex')->name('prosedur-index');
    Route::get('/prosedur/ektp', 'prosedurEktp')->name('prosedur-ektp');
    Route::get('/prosedur/kk', 'prosedurKk')->name('prosedur-kk');
    Route::get('/prosedur/akta', 'prosedurAkta')->name('prosedur-akta');
    Route::get('/prosedur/skck', 'prosedurSkck')->name('prosedur-skck');
});

// User Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('login.submit');

    Route::get('/daftar', [UserAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/daftar', [UserAuthController::class, 'register'])->name('register.submit');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');

    // User Settings
    Route::get('/setelan', [UserSettingController::class, 'index'])->name('user.settings');
    Route::put('/setelan', [UserSettingController::class, 'update'])->name('user.settings.update');
});

// Contact Form Submission
Route::post('/kontak', [App\Http\Controllers\ContactController::class, 'submit'])->name('kontak.submit');

// Service Request Routes
Route::get('/layanan/ajukan/{type}', [App\Http\Controllers\ServiceRequestController::class, 'create'])->name('layanan.ajukan');
Route::post('/layanan/ajukan', [App\Http\Controllers\ServiceRequestController::class, 'store'])->name('layanan.store');
Route::get('/layanan/track', [App\Http\Controllers\ServiceRequestController::class, 'track'])->name('layanan.track');
Route::post('/layanan/check-status', [App\Http\Controllers\ServiceRequestController::class, 'checkStatus'])->name('layanan.check-status');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Legacy admin login (redirect to unified user login)
    Route::get('/login', fn () => redirect()->route('login'))->name('login');
    Route::post('/login', [UserAuthController::class, 'login']);

    // Authenticated admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Content Management
        Route::resource('posts', PostController::class)->except(['show']);
        Route::resource('galleries', GalleryController::class)->except(['show']);
        Route::resource('sliders', SliderController::class)->except(['show']);
        
        // Village Data
        Route::resource('officials', OfficialController::class)->except(['show']);
        Route::resource('services', ServiceController::class)->except(['show']);
        Route::resource('potentials', PotentialController::class)->except(['show']);
        
        // Messages
        Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::post('messages/{message}/reply', [MessageController::class, 'reply'])->name('messages.reply');
        Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        // Service Requests (Pengajuan Layanan Online)
        Route::resource('service-requests', ServiceRequestController::class)->only(['index', 'show', 'update']);
        
        // Settings
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});

