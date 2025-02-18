

@extends('layouts.app', [
    'title' => 'Agenda Desa Duwet',
    'active' => 'agendadesa',
    'page' => 'agendadesa',
])
@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>

        <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="text-5xl font-bold mt-3">Agenda Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span>
            </p>
        </div>
    </section>
    <div class="container mx-auto px-6 py-12 flex justify-center">
        <div class="w-full md:w-2/3">
            <!-- KONTEN LEMBAGA & TABEL -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center"> AGENDA DESA DUWET KECAMATAN PANARUKAN, KABUPATEN Situbondo, Jawa Timur</h1>
                
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-[#42c85f] text-white text-center">
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Judul Agenda</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                <th class="border border-gray-300 px-4 py-2">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            
                            @forelse ($agendas as $index => $agenda)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $agenda->judul }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($agenda->tanggal)->translatedFormat('l, d F Y') }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <a href="{{ route('agenda.show', $agenda->id) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm md:text-base font-semibold border-2 border-[#2dba48] bg-white text-[#2dba48] rounded-lg hover:bg-[#2dba48] hover:text-white transition duration-300 ease-in-out">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="border border-gray-300 px-4 py-2 text-center text-gray-500">Belum ada agenda</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>      
            </div>
        </div>
    </div>
    </div>
@endsection