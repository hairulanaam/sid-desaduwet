@extends('layouts.app', [
    'title' => 'Lembaga Pemerintahan Desa Duwet',
    'active' => 'lembagadesa',
    'page' => 'lembagadesa',
])

<style>
    /* Sembunyikan Scrollbar */
    #agenda-container::-webkit-scrollbar {
        display: none;
    }

    #agenda-container {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-2xl md:text-4xl font-bold mt-3">Lembaga Pemerintahan Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl md:text-4xl ">Duwet</span>
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

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
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
                                    <th class="uppercase border border-gray-300 px-4 py-2">Nama</th>
                                    <th class="uppercase border border-gray-300 px-4 py-2">Agama</th>
                                    <th class="uppercase border border-gray-300 px-4 py-2">Jabatan</th>
                                    <th class="border border-gray-300 px-4 py-2">Kontak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lembaga->anggota as $index => $anggota)
                                    <tr class="text-center">
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($index + 1) }}</td>
                                        <td class="uppercase border border-gray-300 px-4 py-2">{{ formatText($anggota->nama) }}</td>
                                        <td class="uppercase border border-gray-300 px-4 py-2">{{ formatText($anggota->agama) }}</td>
                                        <td class="uppercase border border-gray-300 px-4 py-2">{{ formatText($anggota->jabatan) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ formatText($anggota->kontak) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>

        <!--BAGIAN UTAMA TAGS DAN LINK SOSIAL MEDIA -->
        <div class="w-full absolute left-0 bottom-0 z-50">
            <div class="flex flex-col md:flex-row items-center justify-between bg-white p-3 shadow-lg rounded-md border border-gray-200 text-sm">
                <!-- Bagian Tags -->
                <div class="flex items-center gap-2">
                    <p class="text-gray-700 font-semibold">Tags:</p>
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 font-semibold rounded-md border border-gray-300 shadow-sm">
                        lembaga desa
                    </span>
                </div>
        
                <!-- Bagian Tombol Share -->
                <div class="grid grid-cols-2 md:flex items-center gap-2 mt-3 md:mt-0">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                        class="flex items-center gap-1.5 bg-[#1877F2] text-white px-3 py-1.5 rounded-md shadow-md text-sm transition-transform transform hover:scale-105">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M22.675 0H1.325C.593 0 0 .593 0 1.326V22.67c0 .732.593 1.326 1.325 1.326h11.495V14.89h-3.13v-3.64h3.13V8.412c0-3.1 1.894-4.787 4.662-4.787 1.325 0 2.464.098 2.797.142v3.24h-1.921c-1.507 0-1.8.717-1.8 1.765v2.316h3.6l-.468 3.64h-3.132V24h6.148c.73 0 1.323-.593 1.323-1.326V1.325C24 .593 23.406 0 22.675 0z"/></svg>
                        Facebook
                    </a>
        
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" 
                        class="flex items-center gap-1.5 bg-black text-white px-3 py-1.5 rounded-md shadow-md text-sm transition-transform transform hover:scale-105">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M23.643 4.937c-.835.37-1.732.62-2.675.733a4.659 4.659 0 0 0 2.027-2.567 9.32 9.32 0 0 1-2.952 1.127A4.635 4.635 0 0 0 16.43 3a4.63 4.63 0 0 0-4.62 4.62c0 .36.04.712.118 1.048-3.843-.192-7.24-2.037-9.523-4.84A4.603 4.603 0 0 0 1.92 6.6c0 1.604.81 3.018 2.035 3.85a4.607 4.607 0 0 1-2.098-.578v.06c0 2.236 1.59 4.103 3.7 4.525a4.676 4.676 0 0 1-2.092.08c.59 1.845 2.306 3.19 4.34 3.227a9.318 9.318 0 0 1-5.78 1.988c-.376 0-.748-.022-1.114-.066a13.145 13.145 0 0 0 7.12 2.087c8.544 0 13.223-7.073 13.223-13.22 0-.2-.005-.4-.015-.6A9.394 9.394 0 0 0 24 4.557a9.22 9.22 0 0 1-2.657.727 4.607 4.607 0 0 0 2.03-2.525z"/></svg>
                        Twitter
                    </a>
        
                    <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" 
                        class="flex items-center gap-1.5 bg-[#25D366] text-white px-3 py-1.5 rounded-md shadow-md text-sm transition-transform transform hover:scale-105">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 0a12 12 0 0 0-12 12c0 2.122.555 4.137 1.62 5.926L.19 23.796a.9.9 0 0 0 .922 1.174c2.438-.179 4.764-.917 6.862-2.103a12 12 0 0 0 4.026.688c6.626 0 12-5.374 12-12S18.626 0 12 0zm4.82 16.065c-.293.822-1.478 1.512-2.044 1.6-.566.087-1.221.127-1.984-.228a10.148 10.148 0 0 1-3.863-3.09 10.505 10.505 0 0 1-2.337-4.317c-.41-1.594.429-2.387.915-2.632.505-.25.973-.315 1.372-.27.44.048.8.225 1.083.47.247.217.396.652.247 1.043a3.672 3.672 0 0 1-.63 1.105c-.173.253-.365.406-.164.797.2.391.866 1.428 1.858 2.25 1.059.896 1.92 1.19 2.348 1.34.428.15.777.13 1.06-.038.285-.167.608-.486.82-.762.2-.273.34-.575.533-.878.193-.304.456-.33.73-.213.273.117 1.765.83 2.067.99.302.16.503.233.573.363.07.13.07.88-.222 1.702z"/></svg>
                        WhatsApp
                    </a>
        
                    <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}" 
                        class="flex items-center gap-1.5 bg-[#0088cc] text-white px-3 py-1.5 rounded-md shadow-md text-sm transition-transform transform hover:scale-105">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M21.543 2.467a1.074 1.074 0 0 0-1.118-.087L2.365 10.113a1.073 1.073 0 0 0-.073 1.947l4.68 1.94 1.66 5.538a1.073 1.073 0 0 0 1.648.57l3.012-2.504 4.48 3.25a1.073 1.073 0 0 0 1.66-.682l2.622-14.558a1.073 1.073 0 0 0-.511-1.137z"/></svg>
                        Telegram
                    </a>
                </div>
            </div>
        </div>
        
        <!-- SIDEBAR (AGENDA & BERITA) -->
    <div class="space-y-16">
        <!-- AGENDA DESA (Auto-scroll Loop & Bisa Digulir) -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <!-- Header -->
            <p class="text-xl text-black font-bold">Agenda Desa</p>
            <div class="w-10 bg-[#35b242] h-[2px] rounded-lg mb-4"></div>

            <!-- Container Scrollable -->
            <div id="agenda-container"
                class="flex space-x-4 flex-nowrap cursor-pointer select-none overflow-hidden w-full">
                @foreach ($agendas as $agenda)
                    <a href="{{ route('agenda.show', $agenda->id) }}"
                        class="agenda-item min-w-[250px] bg-gray-100 p-4 rounded-lg shadow-md transition-transform duration-300 hover:scale-105">
                        <p class="text-lg font-semibold text-gray-800">{{ $agenda->judul }}</p>
                        <p class="text-sm text-gray-600 mt-1">📆
                            {{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('l, d F Y') }}</p>
                    </a>
                @endforeach
            </div>
        </div>


        <!-- BERITA DESA -->
        <div class="bg-white shadow-md rounded-lg p-6 max-w-3xl mx-auto">
            <!-- Header -->
            <div class="mb-4">
                <p class="text-xl text-black font-bold">Berita Desa</p>
                <div class="w-10 bg-[#35b242] h-[2px] rounded-lg"></div>
            </div>
            @foreach ($beritaDesa->sortByDesc('tanggal')->take(3) as $berita)
                <div class="flex items-start gap-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                            class="w-full h-full object-cover bg-center rounded-md shadow-md">
                    </div>
                    <div class="flex flex-col justify-between flex-1">
                        <p class="font-semibold text-sm text-black leading-snug">
                            {{ $berita->judul }}
                        </p>
                        <div class="flex flex-wrap gap-2 text-gray-500 text-xs mt-1">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-3 w-auto">
                                <p>{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-3 w-auto">
                                <p>{{ $berita->penulis }}</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-xs mt-2">
                            {{ Str::limit($berita->deskripsi, 100) }}
                        </p>
                        <a href="{{ route('berita.show', $berita->id) }}"
                            class="flex items-center gap-2 text-green-600 text-xs font-semibold mt-2 hover:underline">
                            <p>Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-3 w-auto">
                        </a>
                    </div>
                </div>
                <!-- Jarak Antar Berita -->
                <div class="h-4"></div>
            @endforeach
        </div>
    </div>
    </div>
    </div>
@endsection
<!-- Script Auto Scroll & Drag -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const agendaContainer = document.getElementById("agenda-container");
        const items = [...agendaContainer.children]; // Ambil semua elemen agenda
        let isDown = false;
        let startX, scrollLeft;
        let scrollInterval;

        // Duplikasi item untuk looping
        items.forEach(item => {
            let clone = item.cloneNode(true);
            agendaContainer.appendChild(clone);
        });

        // Auto-scroll loop dengan kecepatan lambat
        function startAutoScroll() {
            scrollInterval = setInterval(() => {
                if (!isDown) {
                    agendaContainer.scrollLeft += 1; // Gerakan lambat
                    if (agendaContainer.scrollLeft >= agendaContainer.scrollWidth / 2) {
                        agendaContainer.scrollLeft = 0; // Reset ke awal tanpa jeda
                    }
                }
            }, 20); // Kecepatan scroll lebih lambat
        }

        startAutoScroll();

        // Hentikan scroll saat hover
        agendaContainer.addEventListener("mouseenter", () => clearInterval(scrollInterval));
        agendaContainer.addEventListener("mouseleave", startAutoScroll);

        // Event Drag Scroll
        agendaContainer.addEventListener("mousedown", (e) => {
            isDown = true;
            clearInterval(scrollInterval);
            startX = e.pageX - agendaContainer.offsetLeft;
            scrollLeft = agendaContainer.scrollLeft;
        });

        agendaContainer.addEventListener("mouseleave", () => isDown = false);
        agendaContainer.addEventListener("mouseup", () => {
            isDown = false;
            startAutoScroll(); // Lanjutkan auto-scroll setelah drag selesai
        });

        agendaContainer.addEventListener("mousemove", (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - agendaContainer.offsetLeft;
            const walk = (x - startX) * 2;
            agendaContainer.scrollLeft = scrollLeft - walk;
        });
    });
</script>