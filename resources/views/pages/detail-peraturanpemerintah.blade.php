@extends('layouts.app', [
    'title' => 'Detail Peraturan Pemerintah',
    'active' => 'detailperaturanpemerintah',
    'page' => 'detailperaturanpemerintah',
])
@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white shadow-md rounded-lg p-6 mt-10 max-w-5xl mx-auto">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#35b242] text-center mb-6">Unduhan</h1>
        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-center mb-6">{{ $peraturanpemerintah->nama_data }}</h1>

        <div class="flex justify-center">
            <div class="w-full max-w-4xl mx-auto overflow-hidden rounded-lg shadow-lg border">
                <iframe id="pdfViewer" 
                        src="{{ asset('storage/'.$peraturanpemerintah->file_path) }}#view=FitH&zoom=100" 
                        class="w-full h-[85vh]" 
                        frameborder="0">
                </iframe>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const iframe = document.getElementById('pdfViewer');

        function adjustIframeSize() {
            const screenWidth = window.innerWidth;
            let height = "85vh"; // Default tinggi

            if (screenWidth > 1440) {
                iframe.src = iframe.src.replace("zoom=100", "zoom=80"); // Atur zoom lebih kecil untuk layar besar
            } else if (screenWidth < 768) {
                height = "80vh"; // Untuk layar kecil
                iframe.src = iframe.src.replace("zoom=100", "zoom=120"); // Zoom lebih besar untuk layar kecil
            }

            iframe.style.height = height;
        }

        adjustIframeSize();
        window.addEventListener("resize", adjustIframeSize);
    });
</script>
@endsection
