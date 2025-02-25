@extends('layouts.app', [
    'title' => 'Pekerjaan Desa Duwet',
    'active' => 'pekerjaan',
    'page' => 'pekerjaan',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-3xl font-bold mt-3">Pekerjaan Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-3xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- KONTEN LEMBAGA & TABEL -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center">
                PEKERJAAN DESA DUWET KECAMATAN PANARUKAN, KABUPATEN SITUBONDO, Jawa Timur
            </h1>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 text-gray-800 text-sm sm:text-base">
                    <thead>
                        <tr class="bg-[#42c85f] text-white text-center">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Nama Pekerjaan</th>
                            <th class="border border-gray-300 px-4 py-2">Laki-Laki</th>
                            <th class="border border-gray-300 px-4 py-2">Perempuan</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah Penduduk</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($pekerjaan as $index => $pekerjaanItem)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pekerjaanItem->nama_pekerjaan }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pekerjaanItem->laki_laki }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pekerjaanItem->perempuan }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pekerjaanItem->jumlah_penduduk }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data pekerjaan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CHART BAGIAN -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-lg font-bold text-gray-800 text-center mb-4">Statistik Pekerjaan</h2>
            <canvas id="pekerjaanChart"></canvas>
        </div>
    </div>

    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('pekerjaanChart').getContext('2d');

            var chartData = {
                labels: {!! json_encode($pekerjaan->pluck('nama_pekerjaan')) !!},
                datasets: [{
                        label: 'Laki-Laki',
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: {!! json_encode($pekerjaan->pluck('laki_laki')) !!}
                    },
                    {
                        label: 'Perempuan',
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: {!! json_encode($pekerjaan->pluck('perempuan')) !!}
                    }
                ]
            };

            new Chart(ctx, {
                type: 'bar',
                data: chartData,
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true // Menumpuk laki-laki dan perempuan di satu bar
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
@endsection
