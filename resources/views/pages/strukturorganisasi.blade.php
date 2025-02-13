@extends('layouts.app', [
    'title' => 'Struktur Organisasi Desa Duwet',
    'active' => 'struktur',
    'page' => 'struktur',
])

@section('content')
    @php
        use Illuminate\Support\Facades\Storage;
        use App\Models\StrukturOrganisasi;
        use Illuminate\Support\Str;
        use Carbon\Carbon;

        function formatText($text) {
            return Str::title($text);
        }

        // Ambil data struktur organisasi terbaru
        $struktur = StrukturOrganisasi::latest()->first();
    @endphp

    <!-- BAGIAN HEADER -->
    <section class="relative bg-cover w-full h-[50vh] flex items-center justify-center"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="text-white text-center relative z-10">
            <h1 class="text-5xl font-bold">Struktur Organisasi Desa
                <span class="bg-[#2dba48] rounded-lg px-2 py-1">Duwet</span>
            </h1>
        </div>
    </section>

    <!-- KONTEN UTAMA -->
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="uppercase text-3xl font-semibold text-gray-800 text-center">STRUKTUR PEMERINTAHAN DESA DUWET</h2>
                
                @if ($struktur)
                    <img src="{{ Storage::url($struktur->gambar) }}" alt="Struktur Organisasi Desa"
                        class="rounded-lg shadow-lg w-full h-[400px] object-cover mt-4">
                    <p class="text-xl font-semibold mt-6 text-gray-600">{{ $struktur->judul }}</p>
                    <p class="mt-3 text-gray-800 text-lg font-bold">{{ $struktur->deskripsi }}</p>
                    <p class="text-gray-600 text-lg">Periode 2019-2025</p>
                @else
                    <p class="text-center text-gray-600">Belum ada data struktur organisasi.</p>
                @endif
                <!-- TABEL STRUKTUR ORGANISASI -->
                <div class="mt-10">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300 text-gray-800">
                            <thead class="bg-[#42c85f] text-white text-center">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle" rowspan="2">NO</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left align-middle" rowspan="2">NAMA LENGKAP</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center" colspan="2">SK PENGANGKATAN</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center align-middle" rowspan="2">JABATAN</th>
                                </tr>
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-center">NOMOR</th>
                                    <th class="border border-gray-300 px-4 py-2 text-center">TANGGAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($struktur && count($struktur->anggota))
                                    @foreach ($struktur->anggota as $index => $anggota)
                                        <tr class="hover:bg-gray-100">
                                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                            <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota['nama_lengkap']) }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $anggota['sk_nomor'] ?? '-' }}</td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">
                                                {{ isset($anggota['sk_tanggal']) ? Carbon::parse($anggota['sk_tanggal'])->translatedFormat('d F Y') : '-' }}

                                            </td>
                                            <td class="border border-gray-300 px-4 py-2 text-center">{{ formatText($anggota['jabatan']) }}</td>
                                            
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-600">Belum ada data anggota.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>

        <!-- SIDEBAR (AGENDA & BERITA, 1 KOLOM KANAN) -->
        <div class="space-y-16 md:col-span-1">
            <!-- AGENDA DESA -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <p class="text-xl text-black font-bold">Agenda Desa</p>
                <div class="w-10 bg-[#35b242] h-[2px] rounded-lg"></div>
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/vector/berita.png') }}" alt="Agenda" class="h-10 w-auto mt-2">
                </div>

                <div class="text-center mt-3">
                    <p class="text-lg font-semibold text-gray-800">Apel Hari Ulang Tahun Kemerdekaan RI ke-77</p>
                    <p class="text-sm text-gray-600 mt-1">📆 Rabu, 17 Agustus 2022</p>
                </div>
            </div>

            <!-- BERITA DESA -->
            <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
                <!-- Header -->
                <div class="mb-4">
                    <p class="text-xl text-black font-bold">Berita Desa</p>
                    <div class="w-10 bg-[#35b242] h-[2px] rounded-lg"></div>
                </div>

                <!-- Berita 1 -->
                <div class="flex items-start gap-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa"
                            class="w-full h-full object-cover bg-center rounded-md shadow-md">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <p class="font-semibold text-sm text-black leading-snug">
                            Gotong Royong Memperbaiki Jalan di Daerah Sekitar Pantai
                        </p>
                        <div class="flex flex-wrap gap-2 text-gray-500 text-xs mt-1">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-3 w-auto">
                                <p>11 Desember 2023</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-3 w-auto">
                                <p>Administrator</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs mt-2">
                            Warga Dusun Pattabakkang Desa Datara melaksanakan kegiatan gotong royong memperbaiki jalan...
                        </p>
                        <a href="#"
                            class="flex items-center gap-2 text-green-600 text-xs font-semibold mt-2 hover:underline">
                            <p>Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-3 w-auto">
                        </a>
                    </div>
                </div>

                <!-- Jarak Antar Berita -->
                <div class="h-4"></div>

                <!-- Berita 2 -->
                <div class="flex items-start gap-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa"
                            class="w-full h-full object-cover bg-center rounded-md shadow-md">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <p class="font-semibold text-sm text-black leading-snug">
                            Kegiatan Bersih Desa dalam Rangka Hari Lingkungan Hidup
                        </p>
                        <div class="flex flex-wrap gap-2 text-gray-500 text-xs mt-1">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-3 w-auto">
                                <p>5 Juni 2023</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-3 w-auto">
                                <p>Administrator</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs mt-2">
                            Masyarakat desa Datara mengadakan kegiatan bersih desa dalam rangka memperingati hari lingkungan
                            hidup...
                        </p>
                        <a href="#"
                            class="flex items-center gap-2 text-green-600 text-xs font-semibold mt-2 hover:underline">
                            <p>Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-3 w-auto">
                        </a>
                    </div>
                </div>

                <!-- Jarak Antar Berita -->
                <div class="h-4"></div>

                <!-- Berita 3 -->
                <div class="flex items-start gap-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa"
                            class="w-full h-full object-cover bg-center rounded-md shadow-md">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <p class="font-semibold text-sm text-black leading-snug">
                            Sosialisasi Program Bantuan UMKM bagi Warga Desa
                        </p>
                        <div class="flex flex-wrap gap-2 text-gray-500 text-xs mt-1">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-3 w-auto">
                                <p>20 Februari 2023</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-3 w-auto">
                                <p>Administrator</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs mt-2">
                            Pemerintah desa mengadakan sosialisasi mengenai program bantuan bagi pelaku UMKM untuk
                            meningkatkan usaha...
                        </p>
                        <a href="#"
                            class="flex items-center gap-2 text-green-600 text-xs font-semibold mt-2 hover:underline">
                            <p>Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-3 w-auto">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection