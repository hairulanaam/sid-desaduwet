@extends('layouts.app', [
    'title' => 'Video Kegiatan Desa Duwet',
    'active' => 'videokegiatan',
    'page' => 'videokegiatan',
])
@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
        <p class="text-5xl font-bold mt-3">Video Kegiatan Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
        </p>
    </div>
</section>

<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($videoKegiatan as $video)
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden transform hover:scale-105 transition-all p-6 relative">
                    <a href="{{ route('video.show', $video->id) }}"  class="block relative">
                        <div class="relative">
                            <img src="{{asset('storage/' . $video->gambar)}}" alt="Video Kegiatan"
                                class="w-full h-64 object-cover rounded-xl">
                            <div class="absolute inset-0 flex justify-center items-center">
                                <div class="bg-white p-4 rounded-full shadow-lg flex justify-center items-center">
                                    <svg class="w-8 h-8" viewBox="0 0 24 24" fill="#2dba48">
                                        <polygon points="8,5 8,19 19,12"></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                    <div class="flex gap-1 items-center mt-5">
                        <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender"
                            class="h-4 w-auto object-contain">
                        <p class="text-[15px] text-[#b0b0b0]">{{ \Carbon\Carbon::parse($video->tanggal)->translatedFormat('l, d F Y') }}</p>
                    </div>
                    <div class="p-6 text-center">
                        <h3 class="text-xl uppercase font-bold text-gray-900 text-justify">
                            {{ $video->judul }}
                        </h3>
                    </div>
                </div>
            @endforeach

            @if ($videoKegiatan->isEmpty())
                <p class="text-center text-gray-500 col-span-3">Belum ada video kegiatan tersedia.</p>
            @endif
        </div>
    </div>
</section>
@endsection
