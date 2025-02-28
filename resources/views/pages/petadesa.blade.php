@extends('layouts.app', [
    'title' => 'Peta Desa Duwet',
    'active' => 'petadesa',
    'page' => 'petadesa',
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
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex items-center justify-center"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-3xl font-bold mt-3">Peta Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-3xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- PETA DESA -->
        <div class="lg:col-span-2">
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
            
                <!-- Tambahkan overflow-x: auto agar tabel bisa di-scroll -->
                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 text-sm sm:text-base">
                        <thead>
                            <tr class="bg-[#42c85f] text-white text-center">
                                <th class="border border-gray-300 px-4 py-2">Puskesmas</th>
                                <th class="border border-gray-300 px-4 py-2">Masjid</th>
                                <th class="border border-gray-300 px-4 py-2">SDN</th>
                                <th class="border border-gray-300 px-4 py-2">Kantor Desa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            use Illuminate\Support\Str;
                            function formatText($text)
                            {
                                return preg_replace_callback(
                                    '/\b\w+\b/',
                                    function ($match) {
                                        return strtoupper($match[0]) === $match[0]
                                            ? strtoupper($match[0])
                                            : Str::title(strtolower($match[0]));
                                    },
                                    $text,
                                );
                            }
                            $petaDesa = \App\Models\PetaDesa::all();
                            @endphp
                            @forelse ($petaDesa as $index => $perangkat)
                                <tr>
                                    <td class="uppercase border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->nama) }}</td>
                                    <td class="uppercase border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->agama) }}</td>
                                    <td class="uppercase border border-gray-300 px-4 py-2 text-center">{{ formatText($perangkat->jabatan) }}</td>
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

                    <!-- Bagian Tags & Share -->
                    <div class="max-w-screen-lg w-full mx-auto bg-white p-4 shadow-lg rounded-md mt-20 border border-gray-200 text-sm">

                        <!-- Bagian Tags & Share -->
                        <div class="flex flex-wrap items-center justify-center md:justify-between gap-3">
                    
                            <!-- Bagian Tags -->
                            <div class="flex items-center gap-2">
                                <p class="text-gray-700 font-semibold text-xs sm:text-sm md:text-base">Tags:</p>
                                <span
                                    class="px-2 py-1 bg-gray-100 text-gray-700 font-semibold rounded-md border border-gray-300 shadow-sm text-xs sm:text-sm md:text-base">
                                    peta desa
                                </span>
                            </div>
                    
                            <!-- Bagian Tombol Share -->
                            <div class="flex flex-wrap justify-center md:justify-end gap-2 text-center md:text-left">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                    class="flex items-center gap-1.5 bg-[#1877F2] text-white px-3 py-1.5 rounded-md shadow-md text-xs sm:text-sm transition-transform transform hover:scale-105">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M22.675 0H1.325C.593 0 0 .593 0 1.326V22.67c0 .732.593 1.326 1.325 1.326h11.495V14.89h-3.13v-3.64h3.13V8.412c0-3.1 1.894-4.787 4.662-4.787 1.325 0 2.464.098 2.797.142v3.24h-1.921c-1.507 0-1.8.717-1.8 1.765v2.316h3.6l-.468 3.64h-3.132V24h6.148c.73 0 1.323-.593 1.323-1.326V1.325C24 .593 23.406 0 22.675 0z" />
                                    </svg>
                                    Facebook
                                </a>
                    
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}"
                                    class="flex items-center gap-1.5 bg-black text-white px-3 py-1.5 rounded-md shadow-md text-xs sm:text-sm transition-transform transform hover:scale-105">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M9.09 9.14L1.01 22h2.87l6.34-10.23L15.66 22h6.43l-8.91-13.64L20.87 2h-2.86l-5.74 9.22L6.92 2H1.01l8.08 13.64z" />
                                    </svg>
                                    X
                                </a>
                    
                                <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}"
                                    class="flex items-center gap-1.5 bg-[#25D366] text-white px-3 py-1.5 rounded-md shadow-md text-xs sm:text-sm transition-transform transform hover:scale-105">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M12 0a12 12 0 0 0-12 12c0 2.122.555 4.137 1.62 5.926L.19 23.796a.9.9 0 0 0 .922 1.174c2.438-.179 4.764-.917 6.862-2.103a12 12 0 0 0 4.026.688c6.626 0 12-5.374 12-12S18.626 0 12 0zm4.82 16.065c-.293.822-1.478 1.512-2.044 1.6-.566.087-1.221.127-1.984-.228a10.148 10.148 0 0 1-3.863-3.09 10.505 10.505 0 0 1-2.337-4.317c-.41-1.594.429-2.387.915-2.632.505-.25.973-.315 1.372-.27.44.048.8.225 1.083.47.247.217.396.652.247 1.043a3.672 3.672 0 0 1-.63 1.105c-.173.253-.365.406-.164.797.2.391.866 1.428 1.858 2.25 1.059.896 1.92 1.19 2.348 1.34.428.15.777.13 1.06-.038.285-.167.608-.486.82-.762.2-.273.34-.575.533-.878.193-.304.456-.33.73-.213.273.117 1.765.83 2.067.99.302.16.503.233.573.363.07.13.07.88-.222 1.702z" />
                                    </svg>
                                    WhatsApp
                                </a>
                    
                                <a href="https://t.me/share/url?url={{ urlencode(url()->current()) }}"
                                    class="flex items-center gap-1.5 bg-[#0088CC] text-white px-3 py-1.5 rounded-md shadow-md text-xs sm:text-sm transition-transform transform hover:scale-105">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 fill-current" viewBox="0 0 24 24">
                                        <path
                                            d="M21.543 2.467a1.074 1.074 0 0 0-1.118-.087L2.365 10.113a1.073 1.073 0 0 0-.073 1.947l4.68 1.94 1.66 5.538a1.073 1.073 0 0 0 1.648.57l3.012-2.504 4.48 3.25a1.073 1.073 0 0 0 1.66-.682l2.622-14.558a1.073 1.073 0 0 0-.511-1.137z" />
                                    </svg>
                                    Telegram
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                    </div> <!-- Penutup dari div "md:col-span-2" -->
                    
            
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
