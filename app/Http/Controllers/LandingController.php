<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\BeritaDesa;
use App\Models\GaleriKegiatan;
use App\Models\PpidDesa;
use App\Models\VideoKegiatan;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\App;

App::setLocale('id');
Carbon::setLocale('id');
CarbonImmutable::setLocale('id');


class LandingController extends Controller
{
    public function index()
    {
        $layanans = [
            [
                'icon' => 'assets/vector/profil.png',
                'jenis' => 'Profil'
            ],
            [
                'icon' => 'assets/vector/struktur.png',
                'jenis' => 'Struktur'
            ],
            [
                'icon' => 'assets/vector/berita.png',
                'jenis' => 'Berita'
            ],
            [
                'icon' => 'assets/vector/e-doc.png',
                'jenis' => 'E-Doc'
            ],
            [
                'icon' => 'assets/vector/statistik.png',
                'jenis' => 'Statistik'
            ],
            [
                'icon' => 'assets/vector/layanan.png',
                'jenis' => 'Layanan'
            ],
        ];

        return view('pages.index')->with([
            'layanans' => $layanans
        ]);
    }

    public function agenda()
    {
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();


        return view('pages.agenda', compact('agendas'));
    }
    public function showAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        $beritaDesa = BeritaDesa::latest()->take(3)->get();

        return view('pages.detail-agenda', compact('agenda', 'agendas', 'beritaDesa'));
    }

    public function ppiddesa()
    {
        $ppidDesa = PpidDesa::orderBy('tanggal', 'desc')->get();
        $beritaDesa = BeritaDesa::latest()->take(3)->get();
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();

        return view('pages.ppiddesa', compact('ppidDesa', 'beritaDesa', 'agendas'));
    }
    public function showPpidDesa($id)
    {
        $ppidDesa = PpidDesa::findOrFail($id);
        $beritaDesa = BeritaDesa::latest()->take(3)->get();
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();

        return view('pages.detail-ppiddesa', compact('ppidDesa', 'beritaDesa', 'agendas'));
    }

    public function beritadesa()
    {
        $beritaDesa = BeritaDesa::orderBy('tanggal', 'desc')->get(); // Ambil semua berita desa dan urutkan dari terbaru
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        return view('pages.beritadesa', compact('beritaDesa', 'agendas'));
    }
    public function showBerita($id)
    {
        $berita = BeritaDesa::findOrFail($id);
        $beritaDesa = BeritaDesa::latest()->take(3)->get();
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();

        return view('pages.detail-berita', compact('berita', 'beritaDesa', 'agendas'));
    }

    public function galerikegiatan()
    {
        $galeriKegiatan = GaleriKegiatan::orderBy('tanggal', 'desc')->get();
        $beritaDesa = BeritaDesa::latest()->take(3)->get();
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();

        return view('pages.galerikegiatan', compact('galeriKegiatan', 'beritaDesa', 'agendas'));
    }
    public function showGaleri($id)
    {
        $galeri = GaleriKegiatan::findOrFail($id); // Cari data berdasarkan ID, jika tidak ditemukan akan error 404
        $beritaDesa = BeritaDesa::latest()->take(3)->get();
        $agendas = Agenda::orderBy('tanggal', 'asc')->get();
        return view('pages.detail-galerikegiatan', compact('galeri', 'beritaDesa', 'agendas'));
    }
    public function videokegiatan()
    {
        $videoKegiatan = VideoKegiatan::orderBy('tanggal', 'desc')->get(); // Ambil data video

        return view('pages.videokegiatan', compact('videoKegiatan')); // Kirim data ke view
    }
    public function showVideo($id)
    {
        $video = VideoKegiatan::findOrFail($id);
        return view('pages.detail-videokegiatan', compact('video'));
    }
}
