@extends('layouts.app', [
    'title' => 'PPID Desa Duwet',
    'active' => 'ppiddesa',
    'page' => 'ppiddesa',
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
            <p class="sm:text-5xl text-3xl font-bold mt-3">PPID Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-3xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN PPID DESA -->
        <div class="lg:col-span-2 order-1 space-y-8">
            @foreach ($ppidDesa as $item)
                <div class="flex flex-col lg:flex-row gap-6 items-center">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar PPID Desa"
                        class="h-52 w-72 object-cover bg-center">
                    <div class="flex flex-col space-y-3 w-full">
                        <p class="font-semibold text-[22px] text-black text-justify leading-tight">
                            {{ $item->judul }}
                        </p>
                        <div class="flex flex-wrap items-center gap-4 text-gray-500 text-sm">
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto">
                                <p class="text-[15px] text-[#b0b0b0]">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto">
                                <p class="text-[15px] text-[#b0b0b0] text-justify">{{ $item->penulis }}</p>
                            </div>
                        </div>
                        <p class="text-[15px] text-[#b0b0b0] text-justify">
                            {{ Str::limit($item->deskripsi, 100, '...') }}
                        </p>
                        <a href="{{ route('ppiddesa.show', $item->id) }}">
                            <div class="flex gap-2 items-center mt-2">
                                <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                                <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>
            @endforeach
            <div class="flex justify-center mt-6">
                <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-2">
                    <!-- Tombol Previous -->
                    @if ($ppidDesa->onFirstPage())
                        <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                            ❮
                        </span>
                    @else
                        <a href="{{ $ppidDesa->previousPageUrl() }}"
                            class="px-3 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition">
                            ❮
                        </a>
                    @endif

                    <!-- Nomor Halaman -->
                    @foreach ($ppidDesa->links()->elements[0] as $page => $url)
                        @if ($page == $ppidDesa->currentPage())
                            <span class="px-3 py-2 bg-green-500 text-white rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="px-3 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    <!-- Tombol Next -->
                    @if ($ppidDesa->hasMorePages())
                        <a href="{{ $ppidDesa->nextPageUrl() }}"
                            class="px-3 py-2 bg-white border border-gray-300 rounded-md hover:bg-gray-100 transition">
                            ❯
                        </a>
                    @else
                        <span class="px-3 py-2 text-gray-400 bg-gray-200 rounded-md cursor-not-allowed">
                            ❯
                        </span>
                    @endif
                    
                </nav>
            </div>
        </div>
        
        

        <div class="space-y-8 order-2">
            <!-- AGENDA DESA (Auto-scroll Loop & Bisa Digulir) -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Header -->
                <p class="text-xl text-black font-bold">Agenda Desa</p>
                <div class="w-10 bg-[#35b242] h-[2px] rounded-lg mb-4"></div>

                <!-- Container Scrollable -->
                <div id="agenda-container"
                    class="flex space-x-4 overflow-x-auto scrollbar-hide">
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
            <div class="bg-white shadow-md rounded-lg p-6">
                <!-- Header -->
                <div class="mb-4">
                    <p class="text-lg sm:text-xl font-bold text-black">Berita Desa</p>
                    <div class="w-10 bg-[#35b242] h-[2px] rounded-lg mb-4"></div>
                </div>
                @foreach ($beritaDesa->sortByDesc('tanggal')->take(3) as $berita)
                    <div class="flex flex-col sm:flex-row gap-4">
                        <div class="w-full sm:w-24 h-24 rounded-md overflow-hidden shadow-md">
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