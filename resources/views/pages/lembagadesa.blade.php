@extends('layouts.app', [
    'title' => 'Lembaga Pemerintahan Desa Duwet',
    'active' => 'lembagadesa',
    'page' => 'lembagadesa',
])
@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="text-5xl font-bold mt-3">Lembaga Pemerintahan Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
            </p>
        </div>
    </section>

    <section class="py-12 bg-gray-100">
        @php
        use App\Models\LembagaDesa;
        use Illuminate\Support\Str;
                        function formatText($text) {
                            return preg_replace_callback('/\b\w+\b/', function ($match) {
                                return strtoupper($match[0]) === $match[0] 
                                    ? strtoupper($match[0]) 
                                    : Str::title(strtolower($match[0]));
                            }, $text);
                        }
        $lembagaDesa = LembagaDesa::with('anggota')->get();
    @endphp

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="md:col-span-2">
            @foreach ($lembagaDesa as $lembaga)
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                    <h1 class="uppercase text-2xl font-bold text-gray-800 text-center mb-4">
                        {{$lembaga->judul}}</h1>
                    <h1 class="uppercase text-1xl font-bold mb-4 text-gray-800 text-center">{{$lembaga->deskripsi}}</h1>

                    <!-- Tabel Struktur Pemerintahan Desa -->
                    <div class="overflow-x-auto">
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
                                @foreach ($lembaga->anggota as $index => $anggota)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($index + 1) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota->nama) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota->agama) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota->jabatan) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota->kontak) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- SIDEBAR (AGENDA & BERITA) -->
        <div class="space-y-16">
            <!-- AGENDA DESA -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Header -->
                <p class="text-xl text-black font-bold">Agenda Desa</p>
                <div class="w-10 bg-[#35b242] h-[2px] rounded-lg"></div>
                <div class="flex flex-col items-center">
                    <!-- Ikon Kalender -->
                    <img src="{{ asset('assets/vector/berita.png') }}" alt="Agenda" class="h-10 w-auto mt-2">
                </div>

                <!-- Konten -->
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