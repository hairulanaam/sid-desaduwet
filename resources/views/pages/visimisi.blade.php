@extends('layouts.app', [
    'title' => 'Visi Misi Desa Duwet',
    'active' => 'visimisi',
    'page' => 'visimisi',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="text-5xl font-bold mt-3">Visi Misi Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- KONTEN VISI & MISI -->
        <div class="md:col-span-2">
            <div class="bg-white shadow-md rounded-lg p-6">
                @php
                    $visiMisi = \App\Models\VisiMisi::latest()->first();
                @endphp

                <!-- Bagian VISI -->
                <h1 class="text-3xl font-bold text-gray-800 text-center">VISI</h1>
                <p class="uppercase mt-3 text-gray-600 text-lg text-center font-semibold">
                    {{ $visiMisi->visi ?? 'Data tidak tersedia' }}
                </p>

                <!-- Bagian MISI -->
                <h2 class="text-3xl font-bold mt-6 text-gray-800 text-center">MISI</h2>
                <p class="mt-3 text-gray-600 text-lg text-justify font-semibold">
                    Dalam rangka mencapai visi tersebut di atas, dirumuskan sejumlah misi sebagai berikut:
                </p>

                <ul class="mt-4 text-gray-600 text-lg list-decimal list-inside space-y-3">
                    @if($visiMisi && $visiMisi->misi)
                        @foreach(explode("\n", $visiMisi->misi) as $misi)
                            <li class="leading-relaxed">{{ trim($misi) }}</li>
                        @endforeach
                    @else
                        <li>Data tidak tersedia</li>
                    @endif
                </ul>

                <!-- Bagian Download -->
                @if ($visiMisi && $visiMisi->file_path)
                    <div class="mt-6 bg-blue-100 p-4 rounded-lg text-center">
                        <p class="text-lg text-gray-700 font-semibold">
                            Download Formulir Visi & Misi ->
                            <a href="{{ asset('storage/'.$visiMisi->file_path) }}" target="_blank" class="text-blue-600 font-bold hover:underline">Download</a>
                        </p>
                    </div>
                @else
                    <div class="mt-6 bg-gray-200 p-4 rounded-lg text-center">
                        <p class="text-lg text-gray-700 font-semibold">Tidak ada dokumen tersedia</p>
                    </div>
                @endif
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