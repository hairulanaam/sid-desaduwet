@extends('layouts.app', [
    'title' => 'Detail Peraturan Menteri',
    'active' => 'detailperaturanmenteri',
    'page' => 'detailperaturanmenteri',
])
@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white shadow-md rounded-lg p-6 mt-10 max-w-5xl mx-auto">
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#35b242] text-center mb-6">Unduhan</h1>
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">{{ $peraturanmenteri->nama_data }}</h1>

            <div class="overflow-x-auto">
                <div class="w-[100vw] md:w-[90vw] lg:max-w-4xl mx-auto overflow-hidden rounded-lg shadow-lg border">
                    <iframe id="pdfViewer" src="{{ asset('storage/' . $peraturanmenteri->file_path) }}#view=FitH&zoom=100"
                        class="w-[100vw] md:w-full h-[85vh]" frameborder="0">
                    </iframe>
                </div>
            </div>
            <div
                class="max-w-screen-lg w-full mx-auto bg-white p-4 shadow-lg rounded-md mt-20 border border-gray-200 text-sm">

                <!-- Bagian Tags & Share -->
                <div class="flex flex-wrap items-center justify-center md:justify-between gap-3">

                    <!-- Bagian Tags -->
                    <div class="flex items-center gap-2">
                        <p class="text-gray-700 font-semibold text-xs sm:text-sm md:text-base">Tags:</p>
                        <span
                            class="px-2 py-1 bg-gray-100 text-gray-700 font-semibold rounded-md border border-gray-300 shadow-sm text-xs sm:text-sm md:text-base">
                            peraturan menteri
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
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const iframeContainer = document.querySelector(".overflow-x-auto");
            const iframe = document.getElementById('pdfViewer');

            function adjustIframeSize() {
                const screenWidth = window.innerWidth;

                if (screenWidth > 1440) {
                    iframe.src = iframe.src.replace("zoom=100", "zoom=80");
                } else if (screenWidth < 768) {
                    iframe.src = iframe.src.replace("zoom=80", "zoom=100");
                }

                iframeContainer.scrollLeft = 0; // Pastikan posisi awal ke kiri
            }

            adjustIframeSize();
            window.addEventListener("resize", adjustIframeSize);
        });
    </script>
@endsection