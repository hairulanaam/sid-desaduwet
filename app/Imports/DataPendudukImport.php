<?php

namespace App\Imports;

use App\Models\DataPenduduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class DataPendudukImport implements ToModel
{
    public function model(array $row)
    {
        return new DataPenduduk([
            'no_kk' => $row[0],
            'nik' => $row[1],
            'nama_lengkap' => $row[2],
            'kabupaten_kota' => $row[3],
            'tanggal_lahir' => $this->convertTanggal($row[4]), // Konversi tanggal
            'jenis_kelamin' => $row[5],
            'status_hubungan_dalam_keluarga' => $row[6],
            'status_perkawinan' => $row[7],
            'agama' => $row[8],
            'pendidikan' => $row[9],
            'pekerjaan' => $row[10],
            'ayah' => $row[11],
            'ibu' => $row[12],
            'alamat' => $row[13],
            'rt' => $row[14],
            'rw' => $row[15],
            'kecamatan' => $row[16],
            'desa_kelurahan' => $row[17],
        ]);
    }

    private function convertTanggal($tanggal)
    {
        if (!$tanggal) {
            return null; // Jika kosong, return null
        }

        try {
            // Jika formatnya numeric (Excel serial number)
            if (is_numeric($tanggal)) {
                return Carbon::instance(Date::excelToDateTimeObject($tanggal))->format('Y-m-d');
            }

            // Jika format sudah Y-m-d, langsung return
            if (preg_match('/\d{4}-\d{2}-\d{2}/', $tanggal)) {
                return $tanggal;
            }

            // Jika format d-m-Y atau d/m/Y, ubah ke Y-m-d
            if (preg_match('/\d{2}-\d{2}-\d{4}/', $tanggal)) {
                return Carbon::createFromFormat('d-m-Y', $tanggal)->format('Y-m-d');
            }

            if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $tanggal)) {
                return Carbon::createFromFormat('d/m/Y', $tanggal)->format('Y-m-d');
            }

            return null; // Format tidak dikenali
        } catch (\Exception $e) {
            return null;
        }
    }
}
