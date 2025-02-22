<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');


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


Route::get('/profil/perangkat-desa', [LandingController::class, 'perangkatdesa'])->name('perangkatdesa');
Route::get('/profil/peta-desa', [LandingController::class, 'petadesa'])->name('petadesa');
Route::get('/profil/lembaga-desa', [LandingController::class, 'lembagadesa'])->name('lembagadesa');
Route::get('/profil/sejarah', [LandingController::class, 'sejarah'])->name('sejarah');
Route::get('/profil/visi-misi', [LandingController::class, 'visimisi'])->name('visimisi');
Route::get('/profil/katasambutan', [LandingController::class, 'sambutan'])->name('sambutan');
Route::get('/profil/struktur-organisasi', [LandingController::class, 'strukturorganisasi'])->name('strukturorganisasi');

Route::get('bumdes/usp-desa', [LandingController::class, 'uspdesa'])->name('uspdesa');
Route::get('bumdes/profil-bumdes', [LandingController::class, 'profilbumdes'])->name('profilbumdes');
Route::get('bumdes/direksi-bumdes', [LandingController::class, 'direksibumdes'])->name('direksibumdes');
Route::get('bumdes/jenis-usaha', [LandingController::class, 'jenisusaha'])->name('jenisusaha');

Route::get('apbdes/infografis-desa', [LandingController::class, 'infografisdesa'])->name('infografisdesa');
?>




 

