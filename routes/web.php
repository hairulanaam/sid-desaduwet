<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/profil/perangkat-desa', [LandingController::class, 'perangkatdesa'])->name('perangkatdesa');
Route::get('/profil/peta-desa', [LandingController::class, 'petadesa'])->name('petadesa');
Route::get('/profil/lembaga-desa', [LandingController::class, 'lembagadesa'])->name('lembagadesa');
Route::get('/profil/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/visi-misi', [LandingController::class, 'visimisi'])->name('visimisi');
Route::get('/profil/sambutan', [LandingController::class, 'sambutan'])->name('sambutan');
Route::get('/profil/struktur-organisasi', [LandingController::class, 'strukturorganisasi'])->name('strukturorganisasi');