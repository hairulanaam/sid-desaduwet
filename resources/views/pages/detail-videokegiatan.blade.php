@extends('layouts.app', [
    'title' => $video->judul,
    'active' => 'videokegiatan',
    'page' => 'videokegiatan',
])

@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-2xl font-bold mt-3">Video Kegiatan Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
        </p>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="bg-white shadow-lg rounded-2xl p-6">
            <div class="relative w-full h-0 pb-[56.25%]">
                <iframe class="absolute top-0 left-0 w-full h-full rounded-lg" 
                    src="https://www.youtube.com/embed/{{ $video->youtube_id }}" 
                    frameborder="0" allowfullscreen>
                </iframe>
            </div>
            <h2 class="text-2xl font-bold mt-5">{{ $video->judul }}</h2>
            <p class="text-gray-700 mt-3">{{ $video->sumber }}</p>
            <p class="text-gray-500 text-sm mt-3">
                Diupload pada {{ \Carbon\Carbon::parse($video->tanggal)->translatedFormat('l, d F Y') }}
            </p>
        </div>
    </div>
</section>
@endsection
