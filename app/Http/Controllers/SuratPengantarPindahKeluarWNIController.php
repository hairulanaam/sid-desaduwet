<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratPengantarPindahKeluarWNIController extends Controller
{
    public function index()
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu');
        }
        
        return view('suratpengantarpindahkeluarwni.index');
    }
    
    public function submit(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nik' => 'required|string|max:16',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_surat' => 'required|string',
        ]);
        
        try {
            // Simpan data ke tabel request_surat
            $requestSurat = new RequestSurat();
            $requestSurat->nik = $validatedData['nik'];
            $requestSurat->nama = $validatedData['nama'];
            $requestSurat->alamat = $validatedData['alamat'];
            $requestSurat->jenis_surat = $validatedData['jenis_surat'];
            $requestSurat->status = 'diminta'; // Status default
            $requestSurat->save();
            
            return redirect()->route('dashboard')->with('success', 'Pengajuan Surat Pengantar Pindah Keluar WNI berhasil dikirim.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}