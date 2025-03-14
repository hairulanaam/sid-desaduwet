@extends('layouts.app', [
    'title' => 'Surat Pengantar Ijin Keramaian Desa Duwet',
    'active' => 'suratpengantarijinkeramaian',
    'page' => 'suratpengantarijinkeramaian',
])

@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-2xl font-bold mt-3">Surat Pengantar Ijin Keramaian Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
        </p>
    </div>
</section>

<div class="container mx-auto px-4 mb-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Form Pengajuan Surat Pengantar Ijin Keramaian</h2>
            
            <form action="" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="nik" class="block text-gray-700 text-sm font-medium mb-2">NIK</label>
                    <input type="text" id="nik" name="nik" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan NIK (16 digit)" maxlength="16" pattern="[0-9]{16}">
                </div>
                
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan nama lengkap sesuai KTP">
                </div>
                
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 text-sm font-medium mb-2">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Masukkan alamat lengkap sesuai KTP"></textarea>
                </div>
                
                <div class="mb-6">
                    <label for="jenis_surat" class="block text-gray-700 text-sm font-medium mb-2">Jenis Surat</label>
                    <input type="text" id="jenis_surat" name="jenis_surat" value="Surat Pengantar Ijin Keramaian" readonly
                        class="w-full px-4 py-2 border border-gray-300 rounded-md bg-gray-100">
                </div>
                
                <div class="flex items-center justify-center">
                    <button type="submit"
                        class="bg-[#2dba48] hover:bg-green-600 text-white font-medium py-2 px-6 rounded-md transition duration-300 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                        Proses Pengajuan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection