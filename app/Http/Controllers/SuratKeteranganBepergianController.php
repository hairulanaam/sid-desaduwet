<?php

namespace App\Http\Controllers;

use App\Models\DataPenduduk;
use Illuminate\Http\Request;
use App\Models\RequestSurat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuratKeteranganBepergianController extends Controller
{
    public function index()
    {
        return view('suratketeranganbepergian.index');
    }
    
    public function submit(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jenis_surat' => 'required|string',
        ]);

        // Format pesan WhatsApp
        $whatsappMessage = "Selamat siang, saya *" . $validatedData['nama_lengkap'] . "*\n" .
            "ingin mengajukan surat *" . $validatedData['jenis_surat'] . "* dengan detail data sebagai berikut\n" .
            "*Nama:* " . $validatedData['nama_lengkap'] . "\n" .
            "*Nomor Telepon:* " . $validatedData['nomor_telepon'] . "\n" .
            "*Alamat:* " . $validatedData['alamat'] . "\n" .
            "*Jenis Surat:* " . $validatedData['jenis_surat'] . "\n\n" .
            "Silahkan konfirmasi data diatas. Dan ketik 'proses' apabila ingin melanjutkan pengajuan surat.";

        // Simpan ke database
        $requestSurat = new RequestSurat();
        $requestSurat->nama = $validatedData['nama_lengkap'];
        $requestSurat->alamat = $validatedData['alamat'];
        $requestSurat->jenis_surat = $validatedData['jenis_surat'];
        $requestSurat->nomor_telepon = $validatedData['nomor_telepon'];
        $requestSurat->status = 'diminta';
        $requestSurat->save();

        // Nomor telepon admin
        $adminNumber = '6289678955070'; // Format: 62 tanpa + atau 0 di depan

        // Bersihkan nomor telepon
        $adminNumber = preg_replace('/[^0-9]/', '', $adminNumber);

        // Pastikan format nomor benar
        if (strpos($adminNumber, '0') === 0) {
            $adminNumber = '62' . substr($adminNumber, 1);
        }

        // Buat URL WhatsApp dengan encoding yang tepat
        $whatsappUrl = "https://wa.me/{$adminNumber}?text=" . rawurlencode($whatsappMessage);

        return redirect($whatsappUrl);
    }
}