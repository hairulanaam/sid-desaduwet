@extends('layouts.app', [
    'title' => 'Surat Keterangan Bepergian Desa Duwet',
    'active' => 'suratketeranganbepergian',
    'page' => 'suratketeranganbepergian',
])

{{-- Surat Keterangan Bepergian --}}

@section('content')
<section class="relative bg-cover w-full h-[50vh] bg-hero flex mb-10"
    style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-2xl font-bold mt-3">Surat Keterangan Bepergian Desa
            <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
        </p>
    </div>
</section>

<div class="container mx-auto px-4 mb-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Form Pengajuan Surat Keterangan Bepergian</h2>
            <form action="{{ route('suratketeranganbepergian.submit') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="nama_lengkap" class="block text-gray-700 text-sm font-medium mb-2">Nama Lengkap (sesuai KTP)</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md"
                        placeholder="Masukkan nama lengkap sesuai KTP">
                </div>

                <div class="mb-4">
                    <label for="nomor_telp" class="block text-gray-700 text-sm font-medium mb-2">Nomor Telepon</label>
                    <input type="text" id="nomor_telepon" name="nomor_telepon" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md"
                        placeholder="Masukkan nomor telepon aktif">
                </div>
                
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 text-sm font-medium mb-2">Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" required 
                        class="w-full px-4 py-2 border border-gray-300 rounded-md"
                        placeholder="Masukkan alamat lengkap"></textarea>
                </div>
                
                <div class="mb-6">
                    <label for="jenis_surat" class="block text-gray-700 text-sm font-medium mb-2">Jenis Surat</label>
                    <input type="text" id="jenis_surat" name="jenis_surat" 
                        value="Surat Keterangan Bepergian" readonly
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