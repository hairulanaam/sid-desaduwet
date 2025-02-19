@extends('layouts.app', [
    'title' => 'Detail Peraturan Bupati',
    'active' => 'detailperaturanbupati',
    'page' => 'detailperaturanbupati',
])
@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="bg-white shadow-md rounded-lg p-6 mt-10">
            <h1 class="text-5xl font-bold text-gray-800 text-center mb-6">Unduhan</h1>
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-6">{{ $peraturanbupati->nama_data }}</h1>

            <div class="flex justify-center">
                <iframe id="pdfViewer" src="{{ asset('storage/'.$peraturanbupati->file_path) }}" class="w-full" frameborder="0"></iframe>
            </div>

        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const iframe = document.getElementById('pdfViewer');

            function adjustIframeSize() {
                const screenWidth = window.innerWidth;
                const screenHeight = window.innerHeight;
                
                // Default ukuran untuk potrait
                let width = "100%";
                let height = "600px";

                if (screenWidth > screenHeight) {
                    // Jika layar lebih lebar dari tinggi (landscape), ubah ukuran iframe
                    height = "80vh"; // 80% dari tinggi layar
                } else {
                    // Jika portrait, biarkan dengan tinggi default
                    height = "100vh";
                }

                iframe.style.width = width;
                iframe.style.height = height;
            }

            adjustIframeSize(); // Jalankan saat halaman dimuat
            window.addEventListener("resize", adjustIframeSize); // Sesuaikan jika layar berubah ukuran
        });
    </script>
@endsection
