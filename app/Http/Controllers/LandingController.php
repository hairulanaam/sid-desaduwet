<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('pages.index')->with([
            'layanans' => $layanans
        ]);
    }
}
