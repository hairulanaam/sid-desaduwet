<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\PerangkatDesa;
use App\Models\InformasiDesa;
use App\Models\PotensiDesa;

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
}
