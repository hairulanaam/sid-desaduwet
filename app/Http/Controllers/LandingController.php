<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\App;

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

        return view('pages.index')->with([
            'layanans' => $layanans
        ]);
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
    {return view('pages.sambutan')->with([]);}
    public function strukturorganisasi ()
    {return view('pages.strukturorganisasi')->with([]);}
}