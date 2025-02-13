@extends('layouts.app', [
    'title' => 'Peta Desa Duwet',
    'active' => 'petadesa',
    'page' => 'petadesa',
])

@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex items-center justify-center"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="text-center text-white z-10">
        <p class="text-5xl font-bold">
            Peta Desa <span class="py-0 px-2 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
        </p>
    </div>
</section>

<div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- PETA DESA -->
    <div class="md:col-span-2">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-xl font-semibold text-black">Peta Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg mb-3"></div>
            <iframe class="w-full h-[300px] md:h-[400px] rounded-lg"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.2743087363237!2d113.98497447376343!3d-7.653625975722968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd72f2de6c88c65%3A0xcd7c6e014f0e24c5!2sKANTOR%20DESA%20DUWET!5e0!3m2!1sid!2sid!4v1738891604502!5m2!1sid!2sid"
                style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
        </div>

        <!-- Tabel Struktur Pemerintahan Desa -->
        <div class="md:col-span-2 mt-6 bg-white p-6 rounded-lg shadow-md">
            <p class="text-xl font-semibold text-black">Keterangan Detail</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg mb-3"></div>
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-[#42c85f] text-white text-center">
                        <th class="border border-gray-300 px-4 py-2">No</th>
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Agama</th>
                        <th class="border border-gray-300 px-4 py-2">Jabatan</th>
                        <th class="border border-gray-300 px-4 py-2">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        use Illuminate\Support\Str;
                        function formatText($text) {
                            return preg_replace_callback('/\b\w+\b/', function ($match) {
                                return strtoupper($match[0]) === $match[0] 
                                    ? strtoupper($match[0]) 
                                    : Str::title(strtolower($match[0]));
                            }, $text);
                        }
                        $petaDesa = \App\Models\PetaDesa::all();
                    @endphp

                    @forelse ($petaDesa as $index => $perangkat)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->nama) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->agama) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->jabatan) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $perangkat->kontak }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-600">
                                Belum ada data perangkat desa yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- SIDEBAR (AGENDA & BERITA) -->
    <div class="md:col-span-1 space-y-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <p class="text-xl font-semibold text-black">Agenda Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg mb-3"></div>
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