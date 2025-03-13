@extends('layouts.app', [
    'title' => 'Pelayanan Mandiri Desa Duwet',
    'active' => 'pelayananmandiri',
    'page' => 'pelayananmandiri',
])

@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-2xl font-bold mt-3">Pelayanan Mandiri Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
        </p>
    </div>
</section>

<section class="container mx-auto px-4 mb-16">
    <div class="text-center mb-12">
        <h2 class="uppercase text-2xl sm:text-3xl lg:text-4xl font-semibold text-[#2dba48]  text-center mb-4">PELAYANAN SURAT</h2>
        <p class="text-gray-600 max-w-2xl mx-auto text-lg sm:text-xl md:text-2xl lg:text-3xl text-center">
            Layanan pembuatan surat mandiri untuk warga Desa Duwet
          </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-10">
        <!-- Surat Pengantar Legalisasi SKCK -->
        <a href="{{ route('suratpengantarskck') }}" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Pengantar Legalisasi SKCK</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Keterangan Tidak Mampu -->
        <a href="pelayanan/pelayanan-mandiri/surat-keterangan-tidak-mampu" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Keterangan Tidak Mampu (Pendidikan)</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Pengantar Pindah Keluar WNI -->
        <a href="pelayanan/pelayanan-mandiri/surat-pengantar-pindah-keluar-wni" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Pengantar Pindah Keluar WNI</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Pengantar Ijin Keramaian -->
        <a href="pelayanan/pelayanan-mandiri/surat-pengantar-ijin-keramaian" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Pengantar Ijin Keramaian</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Keterangan Domisili Lembaga -->
        <a href="pelayanan/pelayanan-mandiri/surat-keterangan-domisili-lembaga" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Keterangan Domisili Lembaga</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Keterangan Bepergian -->
        <a href="pelayanan/pelayanan-mandiri/surat-keterangan-bepergian" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Keterangan Bepergian</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>

        <!-- Surat Keterangan Usaha -->
        <a href="pelayanan/pelayanan-mandiri/surat-keterangan-usaha" class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all overflow-hidden group">
            <div class="p-6 flex flex-col items-center justify-between h-full">
                <div class="w-16 h-16 md:w-20 md:h-20 bg-[#2dba48] text-white rounded-full flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-lg md:text-xl font-bold mb-2 text-center text-gray-800">Surat Keterangan Usaha</h3>
                <span class="mt-4 inline-block bg-[#2dba48] text-white py-2 px-4 rounded-md group-hover:bg-[#249a3d] transition-colors">Ajukan</span>
            </div>
        </a>
    </div>
</section>
@endsection