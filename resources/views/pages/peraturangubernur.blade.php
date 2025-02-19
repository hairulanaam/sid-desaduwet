@extends('layouts.app', [
    'title' => 'Peraturan Gubernur Desa Duwet',
    'active' => 'peraturangubernur',
    'page' => 'peraturangubernur',
])
@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-2xl  font-bold mt-3">Peraturan Gubernur Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex justify-center">
        <div class="w-full md:w-2/3">
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center"> 
                    Peraturan Gubernur DESA DUWET KECAMATAN PANARUKAN, KABUPATEN SITUBONDO, JAWA TIMUR
                </h1>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-[#42c85f] text-white text-center">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nama Data</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                <th class="border border-gray-300 px-4 py-2">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse ($peraturangubernur as $index => $peraturangubernurs)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $peraturangubernurs->nama_data }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ \Carbon\Carbon::parse($peraturangubernurs->tanggal)->translatedFormat('l, d F Y') }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <!-- Tombol Tampilkan -->
                                        <a href="{{ route('peraturangubernur.show', $peraturangubernurs->id) }}" 
                                            class="inline-flex items-center justify-center px-4 py-2 text-sm md:text-base font-semibold border-2 border-green-500 bg-white text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition duration-300 ease-in-out">
                                            Tampilkan
                                        </a>
                                        <!-- Tombol Download -->
                                        <a href="{{ asset('storage/'.$peraturangubernurs->file_path) }}" download 
                                            class="inline-flex items-center justify-center px-4 py-2 text-sm md:text-base font-semibold border-2 border-green-500 bg-white text-green-500 rounded-lg hover:bg-green-500 hover:text-white transition duration-300 ease-in-out">
                                            Download
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </div>
@endsection
