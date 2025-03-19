<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SuratKeteranganBepergianController;
use App\Http\Controllers\SuratKeteranganDomisiLembagaController;
use App\Http\Controllers\SuratKeteranganUsahaController;
use App\Http\Controllers\SuratPengantarIjinKeramaianController;
use App\Http\Controllers\SuratPengantarSKCKController;
use App\Http\Controllers\SuratPengantarSKTMController;
use App\Http\Controllers\SuratPengantarPindahKeluarWNIController;

Route::get('/', [LandingController::class, 'index'])->name('home');

Route::get('/statistik/jumlah-penduduk', [LandingController::class, 'jumlahpenduduk'])->name('jumlahpenduduk');
Route::get('/statistik/pekerjaan', [LandingController::class, 'pekerjaan'])->name('pekerjaan');
Route::get('/statistik/pendidikan', [LandingController::class, 'pendidikan'])->name('pendidikan');
Route::get('/statistik/status-perkawinan', [LandingController::class, 'statusperkawinan'])->name('statusperkawinan');
Route::get('/statistik/golongan-darah', [LandingController::class, 'golongandarah'])->name('golongandarah');
Route::get('/statistik/agama', [LandingController::class, 'agama'])->name('agama');
Route::get('/statistik/kelas-sosial', [LandingController::class, 'kelassosial'])->name('kelassosial');
Route::get('/statistik/jamkesmas', [LandingController::class, 'jamkesmas'])->name('jamkesmas');
Route::get('/statistik/program-keluarga-harapan', [LandingController::class, 'programkeluargaharapan'])->name('programkeluargaharapan');
Route::get('/statistik/kepala-keluarga', [LandingController::class, 'kepalakeluarga'])->name('kepalakeluarga');
Route::get('/statistik/gizi-buruk', [LandingController::class, 'giziburuk'])->name('giziburuk');
Route::get('/statistik/kehamilan', [LandingController::class, 'kehamilan'])->name('kehamilan');
Route::get('/statistik/buruh-migran', [LandingController::class, 'buruhmigran'])->name('buruhmigran');
Route::get('/statistik/bantuan-siswa-miskin', [LandingController::class, 'bantuansiswamiskin'])->name('bantuansiswamiskin');

Route::get('/e-doc/undang-undang', [LandingController::class, 'undangundang'])->name('undangundang');
Route::get('/e-doc/undang-undang/{id}', [LandingController::class, 'showundangundang'])->name('undangundang.show');
Route::get('/e-doc/peraturan-bupati', [LandingController::class, 'peraturanbupati'])->name('peraturanbupati');
Route::get('/e-doc/peraturan-bupati/{id}', [LandingController::class, 'showperaturanbupati'])->name('peraturanbupati.show');
Route::get('/e-doc/peraturan-menteri', [LandingController::class, 'peraturanmenteri'])->name('peraturanmenteri');
Route::get('/e-doc/peraturan-menteri/{id}', [LandingController::class, 'showperaturanmenteri'])->name('peraturanmenteri.show');
Route::get('/e-doc/peraturan-pemerintah', [LandingController::class, 'peraturanpemerintah'])->name('peraturanpemerintah');
Route::get('/e-doc/peraturan-pemerintah/{id}', [LandingController::class, 'showperaturanpemerintah'])->name('peraturanpemerintah.show');
Route::get('/e-doc/peraturan-gubernur', [LandingController::class, 'peraturangubernur'])->name('peraturangubernur');
Route::get('/e-doc/peraturan-gubernur/{id}', [LandingController::class, 'showperaturangubernur'])->name('peraturangubernur.show');
Route::get('/e-doc/unduhan', [LandingController::class, 'unduhan'])->name('unduhan');
Route::get('/e-doc/unduhan/{id}', [LandingController::class, 'showunduhan'])->name('unduhan.show');

Route::get('/profil/perangkat-desa', [LandingController::class, 'perangkatdesa'])->name('perangkatdesa');
Route::get('/profil/peta-desa', [LandingController::class, 'petadesa'])->name('petadesa');
Route::get('/profil/lembaga-desa', [LandingController::class, 'lembagadesa'])->name('lembagadesa');
Route::get('/profil/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/visi-misi', [LandingController::class, 'visimisi'])->name('visimisi');
Route::get('/profil/katasambutan', [LandingController::class, 'sambutan'])->name('sambutan');
Route::get('/profil/struktur-organisasi', [LandingController::class, 'strukturorganisasi'])->name('strukturorganisasi');
Route::get('/profil/geografis-desa', [LandingController::class, 'geografisdesa'])->name('geografisdesa');
Route::get('/profil/informasi-umum', [LandingController::class, 'informasiumum'])->name('informasiumum');

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

// Rute untuk pengguna yang belum login (guest)


// Rute untuk pengguna yang sudah login (auth)
Route::middleware('auth')->group(function () {
    Route::get('pelayanan/pelayanan-mandiri', [LandingController::class, 'pelayananmandiri'])
        ->name('pelayananmandiri');
    Route::get('pelayanan/pelayanan-mandiri/surat-pengantar-skck', [SuratPengantarSKCKController::class, 'index'])
        ->name('suratpengantarskck.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-pengantar-skck/submit', [SuratPengantarSKCKController::class, 'submit'])->name('suratpengantarskck.submit');

    Route::get('pelayanan/pelayanan-mandiri/surat-keterangan-tidak-mampu', [SuratPengantarSKTMController::class, 'index'])
        ->name('suratpengantarsktm.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-keterangan-tidak-mampu/submit', [SuratPengantarSKTMController::class, 'submit'])
        ->name('suratpengantarsktm.submit');

    Route::get('pelayanan/pelayanan-mandiri/surat-pengantar-pindah-keluar-wni', [SuratPengantarPindahKeluarWNIController::class, 'index'])
        ->name('suratpengantarpindahkeluarwni.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-pengantar-pindah-keluar-wni/submit', [SuratPengantarPindahKeluarWNIController::class, 'submit'])
        ->name('suratpengantarpindahkeluarwni.submit');


    Route::get('pelayanan/pelayanan-mandiri/surat-pengantar-ijin-keramaian', [SuratPengantarIjinKeramaianController::class, 'index'])
        ->name('suratpengantarijinkeramaian.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-pengantar-ijin-keramaian/submit', [SuratPengantarIjinKeramaianController::class, 'submit'])
        ->name('suratpengantarijinkeramaian.submit');

    Route::get('pelayanan/pelayanan-mandiri/surat-keterangan-domisili-lembaga', [SuratKeteranganDomisiLembagaController::class, 'index'])
        ->name('suratketerangandomisililembaga.index');
    Route::get('pelayanan/pelayanan-mandiri/surat-keterangan-domisili-lembaga/submit', [SuratKeteranganDomisiLembagaController::class, 'submit'])
        ->name('suratketerangandomisililembaga.submit');


    Route::get('pelayanan/pelayanan-mandiri/surat-keterangan-bepergian', [SuratKeteranganBepergianController::class, 'index'])
        ->name('suratketeranganbepergian.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-keterangan-bepergian/submit', [SuratKeteranganBepergianController::class, 'submit'])
        ->name('suratketeranganbepergian.submit');


    Route::get('pelayanan/pelayanan-mandiri/surat-keterangan-usaha', [SuratKeteranganUsahaController::class, 'index'])
        ->name('suratketeranganusaha.index');
    Route::post('pelayanan/pelayanan-mandiri/surat-keterangan-usaha/submit', [SuratKeteranganUsahaController::class, 'submit'])
        ->name('suratketeranganusaha.submit');
});

Route::get('pelayanan/pelayanan-mandiri', [LandingController::class, 'pelayananmandiri'])
    ->name('pelayananmandiri');


// Route::get('login', [LandingController::class, 'login'])->name('login');
// di routes/web.php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:penduduk'])->name('dashboard');

// Routes/web.php - Tambahkan route untuk dashboard profil
Route::get('/dashboard/profil', function () {
    return view('dashboardprofil');
})->middleware(['auth:penduduk'])->name('dashboardprofil');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

require __DIR__ . '/auth.php';
