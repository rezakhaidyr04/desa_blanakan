<?php

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

Route::controller(App\Http\Controllers\PageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/profil', 'profil')->name('profil');
    Route::get('/potensi', 'potensi')->name('potensi');
    Route::get('/layanan', 'layanan')->name('layanan');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/galeri', 'galeri')->name('galeri');
    Route::get('/kontak', 'kontak')->name('kontak');
});

// Contact Form Submission
Route::post('/kontak', [App\Http\Controllers\ContactController::class, 'submit'])->name('kontak.submit');
