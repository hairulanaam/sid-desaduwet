@extends('layouts.app', [
    'title' => $video->judul,
    'active' => 'videokegiatan',
    'page' => 'videokegiatan',
])

@section('content')
<section class="relative bg-cover w-full h-[40vh] sm:h-[50vh] md:h-[60vh] bg-hero flex mb-8"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="flex justify-center items-center text-center mx-auto text-white z-10 flex-col px-4">
        <p class="text-lg sm:text-2xl md:text-4xl font-bold mt-3 leading-tight">
            Video Kegiatan Desa
            <span class="py-0 px-2 bg-[#2dba48] rounded-lg sm:text-3xl md:text-[36px] text-lg">Duwet</span>
        </p>
    </div>
</section>

<section class="py-10 bg-gray-100">
    <div class="container mx-auto px-4 sm:px-5 lg:px-16">
        <div class="bg-white shadow-lg rounded-xl p-4 sm:p-5 md:p-6">
            <div class="relative w-full h-0 pb-[50%]">
                <iframe class="absolute top-0 left-0 w-full h-full rounded-md" 
                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}" 
                    frameborder="0" allowfullscreen>
                </iframe>
            </div>
            <h2 class="text-lg sm:text-xl md:text-2xl font-bold mt-4">{{ $video->judul }}</h2>
            <p class="text-gray-700 mt-2 text-sm sm:text-base md:text-lg">{{ $video->sumber }}</p>
            <p class="text-gray-500 text-xs sm:text-sm md:text-base mt-2">
                Diupload pada {{ \Carbon\Carbon::parse($video->tanggal)->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>
</section>
@endsection
