<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/profil/perangkat-desa', [LandingController::class, 'perangkatdesa'])->name('perangkatdesa');
Route::get('/profil/peta-desa', [LandingController::class, 'petadesa'])->name('petadesa');
Route::get('/profil/lembaga-desa', [LandingController::class, 'lembagadesa'])->name('lembagadesa');
Route::get('/profil/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/visi-misi', [LandingController::class, 'visimisi'])->name('visimisi');
Route::get('/profil/katasambutan', [LandingController::class, 'sambutan'])->name('sambutan');
Route::get('/profil/struktur-organisasi', [LandingController::class, 'strukturorganisasi'])->name('strukturorganisasi');

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

Route::get('potensi/bidang-pariwisata', [LandingController::class, 'bidangpariwisata'])->name('bidangpariwisata');
Route::get('potensi/bidang-pertanian', [LandingController::class, 'bidangpertanian'])->name('bidangpertanian');
Route::get('potensi/bidang-perikanan', [LandingController::class, 'bidangperikanan'])->name('bidangperikanan');
Route::get('potensi/bidang-industri', [LandingController::class, 'bidangindustri'])->name('bidangindustri');
Route::get('potensi/bidang-perkebunan', [LandingController::class, 'bidangperkebunan'])->name('bidangperkebunan');

Route::get('bumdes/usp-desa', [LandingController::class, 'uspdesa'])->name('uspdesa');
Route::get('bumdes/profil-bumdes', [LandingController::class, 'profilbumdes'])->name('profilbumdes');
Route::get('bumdes/direksi-bumdes', [LandingController::class, 'direksibumdes'])->name('direksibumdes');
Route::get('bumdes/jenis-usaha', [LandingController::class, 'jenisusaha'])->name('jenisusaha');

Route::get('apbdes/infografis-desa', [LandingController::class, 'infografisdesa'])->name('infografisdesa');


 
