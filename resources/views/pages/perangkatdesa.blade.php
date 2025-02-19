@extends('layouts.app', [
    'title' => 'Perangkat Desa Duwet',
    'active' => 'perangkat',
    'page' => 'perangkat',
])
@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
        <p class="text-5xl font-bold mt-3">Perangkat Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
        </p>
    </div>
</section>
<section class="py-12 bg-gray-100">
    <div class="container mx-auto px-6 lg:px-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $perangkatDesa = \App\Models\PerangkatDesa::all();
            @endphp

            @forelse ($perangkatDesa as $perangkat)
                <div class="bg-white shadow-lg rounded-2xl overflow-hidden transform hover:scale-105 transition-all p-6">
                    <img src="{{ asset('storage/' . $perangkat->gambar) }}" 
                        alt="{{ $perangkat->nama }}" 
                        class="w-full h-64 object-cover rounded-xl">
                    <div class="p-6 text-center">
                        <h3 class="uppercase text-2xl font-bold text-gray-900">{{ $perangkat->nama }}</h3>
                        <p class="uppercase text-gray-500 text-lg mt-1">{{ $perangkat->jabatan }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-600 text-lg col-span-3 text-center">Belum ada data perangkat desa yang tersedia.</p>
            @endforelse
        </div>
    </div>
</section>

@endsection