@extends('layouts.app', [
    'title' => 'Berita Desa Duwet',
    'active' => 'beritadesa',
    'page' => 'beritadesa',
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

        <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="text-5xl font-bold mt-3">Berita Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
            </p>

        </div>
    </section>

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- KONTEN BERITA DESA -->
        <div class="col-span-2 space-y-5">
            @foreach ($beritaDesa as $berita)
                <div class="flex gap-3 items-center">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
                        class="h-52 w-72 object-cover bg-center">
                    <div class="flex-col space-y-3">
                        <p class="font-semibold text-[22px] text-black text-justify leading-tight">{{ $berita->judul }}</p>
                        <div class="flex items-center gap-4">
                            <div class="flex gap-1 items-center">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender"
                                    class="h-4 w-auto object-contain">
                                <p class="text-[15px] text-[#b0b0b0]">
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="flex gap-1 items-center">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis"
                                    class="h-4 w-auto object-contain">
                                <p class="text-[15px] text-[#b0b0b0]">{{ $berita->penulis }}</p>
                            </div>
                        </div>
                        <p class="text-[15px] text-[#b0b0b0] text-justify">{{ Str::limit($berita->deskripsi, 100) }}</p>
                        <a href="{{ route('berita.show', $berita->id) }}">
                            <div class="flex gap-2 items-center mt-2">
                                <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                                <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>
            @endforeach
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
