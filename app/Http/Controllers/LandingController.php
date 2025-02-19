<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

use App\Models\Agenda;
use App\Models\BantuanSiswaMiskin;
use App\Models\BeritaDesa;
use App\Models\BuruhMigran;
use App\Models\GaleriKegiatan;
use App\Models\GiziBuruk;
use App\Models\GolonganDarah;
use App\Models\Jamkesmas;
use App\Models\Kehamilan;
use App\Models\KelasSosial;
use App\Models\KepalaKeluarga;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PeraturanBupati;
use App\Models\PeraturanGubernur;
use App\Models\PeraturanMenteri;
use App\Models\PeraturanPemerintah;
use App\Models\PpidDesa;
use App\Models\ProgramKeluargaHarapan;
use App\Models\StatusPerkawinan;
use App\Models\UndangUndang;
use App\Models\Unduhan;
use App\Models\VideoKegiatan;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\App;
use App\Models\Berita;
use App\Models\PerangkatDesa;
use App\Models\InformasiDesa;
use App\Models\PotensiDesa;

App::setLocale('id');
Carbon::setLocale('id');
CarbonImmutable::setLocale('id');


class LandingController extends Controller
{
    public function index(){
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

        $beritas = Berita::latest()->take(3)->get();
        $perangkatdesas = PerangkatDesa::all();
        $informasidesas = InformasiDesa::first();
        $potensidesas = PotensiDesa::all();
        return view('pages.index', compact('layanans', 'beritas', 'perangkatdesas', 'informasidesas', 'potensidesas'));
    }

    public function pekerjaan()
    {
        
        $pekerjaan = Pekerjaan::latest()->get();

        return view('pages.pekerjaan', compact('pekerjaan'));
    }

    public function pendidikan()
    {
        
        $pendidikan = Pendidikan::latest()->get();

        return view('pages.pendidikan', compact('pendidikan'));
    }

    public function statusperkawinan()
    {
        
        $statusPerkawinan = StatusPerkawinan::latest()->get();

        return view('pages.statusperkawinan', compact('statusPerkawinan'));
    }

    public function golongandarah()
    {
        
        $golonganDarah = GolonganDarah::latest()->get();

        return view('pages.golongandarah', compact('golonganDarah'));
    }

    public function agama()
    {
        
        $agama = Agama::latest()->get();

        return view('pages.agama', compact('agama'));
    }
    public function kelassosial()
    {
        // Mengambil semua data pekerjaan terbaru
        $kelasSosial = KelasSosial::latest()->get();

        return view('pages.kelassosial', compact('kelasSosial'));
    }

    public function jamkesmas()
    {
        // Mengambil semua data pekerjaan terbaru
        $jamkesmas = Jamkesmas::latest()->get();

        return view('pages.jamkesmas', compact('jamkesmas'));
    }

    public function programkeluargaharapan()
    {
        // Mengambil semua data pekerjaan terbaru
        $programkeluargaharapan = ProgramKeluargaHarapan::latest()->get();

        return view('pages.programkeluargaharapan', compact('programkeluargaharapan'));
    }

    public function kepalakeluarga()
    {
        // Mengambil semua data pekerjaan terbaru
        $kepalakeluarga = KepalaKeluarga::latest()->get();

        return view('pages.kepalakeluarga', compact('kepalakeluarga'));
    }

    public function giziburuk()
    {
        // Mengambil semua data pekerjaan terbaru
        $giziburuk = GiziBuruk::latest()->get();

        return view('pages.giziburuk', compact('giziburuk'));
    }

    public function kehamilan()
    {
        // Mengambil semua data pekerjaan terbaru
        $kehamilan = Kehamilan::latest()->get();

        return view('pages.kehamilan', compact('kehamilan'));
    }

    public function buruhmigran()
    {
        // Mengambil semua data pekerjaan terbaru
        $buruhmigran = BuruhMigran::latest()->get();

        return view('pages.buruhmigran', compact('buruhmigran'));
    }

    public function bantuansiswamiskin()
    {
        // Mengambil semua data pekerjaan terbaru
        $bantuansiswamiskin = BantuanSiswaMiskin::latest()->get();

        return view('pages.bantuansiswamiskin', compact('bantuansiswamiskin'));
    }

    public function undangundang()
    {
        // Mengambil semua data pekerjaan terbaru
        $undangundang = UndangUndang::latest()->get();

        return view('pages.undangundang', compact('undangundang'));
    }

    public function showundangundang($id)
    {
        $undangundang = UndangUndang::findOrFail($id);
        return view('pages.detail-undangundang', compact('undangundang'));
    }

    public function peraturanbupati()
    {
        // Mengambil semua data pekerjaan terbaru
        $peraturanbupati = PeraturanBupati::latest()->get();

        return view('pages.peraturanbupati', compact('peraturanbupati'));
    }

    public function showperaturanbupati($id)
    {
        $peraturanbupati = peraturanbupati::findOrFail($id);
        return view('pages.detail-peraturanbupati', compact('peraturanbupati'));
    }

    public function peraturanmenteri()
    {
        // Mengambil semua data pekerjaan terbaru
        $peraturanmenteri = PeraturanMenteri::latest()->get();

        return view('pages.peraturanmenteri', compact('peraturanmenteri'));
    }

    public function showperaturanmenteri($id)
    {
        $peraturanmenteri= PeraturanMenteri::findOrFail($id);

        return view('pages.detail-peraturanmenteri', compact('peraturanmenteri'));
    }

    public function peraturanpemerintah()
    {
        // Mengambil semua data pekerjaan terbaru
        $peraturanpemerintah = PeraturanPemerintah::latest()->get();

        return view('pages.peraturanpemerintah', compact('peraturanpemerintah'));
    }

    public function showperaturanpemerintah($id)
    {
        $peraturanpemerintah= PeraturanPemerintah::findOrFail($id);

        return view('pages.detail-peraturanpemerintah', compact('peraturanpemerintah'));
    }



    public function peraturangubernur()
    {
        // Mengambil semua data pekerjaan terbaru
        $peraturangubernur = PeraturanGubernur::latest()->get();

        return view('pages.peraturangubernur', compact('peraturangubernur'));
    }

    public function showperaturangubernur($id)
    {
        $peraturangubernur= PeraturanGubernur::findOrFail($id);

        return view('pages.detail-peraturangubernur', compact('peraturangubernur'));
    }

    public function unduhan()
    {
        // Mengambil semua data pekerjaan terbaru
        $unduhan = Unduhan::latest()->get();

        return view('pages.unduhan', compact('unduhan'));
    }

    public function showunduhan($id)
    {
        $unduhan = Unduhan::findOrFail($id);

        return view('pages.detail-unduhan', compact('unduhan'));
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
        $ppidDesa = PpidDesa::orderBy('tanggal', 'desc')->paginate(4);
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
        $beritaDesa = BeritaDesa::orderBy('tanggal', 'desc')->paginate(4); // Ambil semua berita desa dan urutkan dari terbaru
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
    public function perangkatdesa ()
    {return view('pages.perangkatdesa')->with([]);}
    public function petadesa ()
    {return view('pages.petadesa')->with([]);}
    public function lembagadesa ()
    {return view('pages.lembagadesa')->with([]);}
    public function sejarah ()
    {return view('pages.sejarah')->with([]);}
    public function visimisi ()
    {return view('pages.visimisi')->with([]);}
    public function sambutan ()
    {return view('pages.katasambutan')->with([]);}
    public function strukturorganisasi ()
    {return view('pages.strukturorganisasi')->with([]);}
}

    


