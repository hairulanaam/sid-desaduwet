<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/publikasi/agenda', [LandingController::class, 'agenda'])->name('agenda');
Route::get('/publikasi/agenda/{id}', [LandingController::class, 'showAgenda'])->name('agenda.show');
Route::get('/publikasi/ppid-desa', [LandingController::class, 'ppiddesa'])->name('ppiddesa');
Route::get('publikasi/ppid-desa/{id}', [LandingController::class, 'showPpidDesa'])->name('ppiddesa.show');
Route::get('publikasi/berita-desa', [LandingController::class, 'beritadesa'])->name('beritadesa');
Route::get('publikasi/berita-desa/{id}', [LandingController::class, 'showBerita'])->name('berita.show');
Route::get('publikasi/galeri-kegiatan', [LandingController::class, 'galerikegiatan'])->name('galerikegiatan');
Route::get('publikasi/galeri-kegiatan/{id}', [LandingController::class, 'showGaleri'])->name('galeri.show');
Route::get('publikasi/video-kegiatan', [LandingController::class, 'videokegiatan'])->name('videokegiatan');
Route::get('publikasi/video-kegiatan/{id}', [LandingController::class, 'showVideo'])->name('video.show');


