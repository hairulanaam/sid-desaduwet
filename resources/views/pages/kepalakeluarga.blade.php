@extends('layouts.app', [
    'title' => 'Kepala Keluarga Desa Duwet',
    'active' => 'kepalakeluarga',
    'page' => 'kepalakeluarga',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-2xl font-bold mt-3">Kepala Keluarga Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- KONTEN LEMBAGA & TABEL -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center">
                Kepala Keluarga DESA DUWET KECAMATAN PANARUKAN, KABUPATEN Situbondo, Jawa Timur
            </h1>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 text-gray-800 text-sm sm:text-base">
                    <thead>
                        <tr class="bg-[#42c85f] text-white text-center">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Kategori</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @php
                            $totalKeluarga = 0;
                        @endphp
                        @forelse ($kepalakeluarga as $index => $kepalakeluargaItem)
                            @php
                                $totalKeluarga += $kepalakeluargaItem->jumlah_keluarga;
                            @endphp
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kepalakeluargaItem->kategori }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    {{ $kepalakeluargaItem->jumlah_keluarga }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data kepala keluarga
                                </td>
                            </tr>
                        @endforelse
                        <!-- Baris Jumlah -->
                        <tr class="bg-gray-100 font-bold text-center">
                            <td class="border border-gray-300 px-4 py-2 text-center" colspan="2">Jumlah</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $totalKeluarga }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CHART BAGIAN -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-lg font-bold text-gray-800 text-center mb-4">Statistik Kepala Keluarga</h2>
            <div class="relative w-full h-[300px]">
                <canvas id="kepalakeluargaChart"></canvas>
            </div>
        </div>
    </div>


    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('kepalakeluargaChart').getContext('2d');

            var labels = {!! json_encode($kepalakeluarga->pluck('kategori')) !!};
            var dataValues = {!! json_encode($kepalakeluarga->pluck('jumlah_keluarga')) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah",
                        data: dataValues,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        barThickness: 150
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Pastikan aspect ratio bisa disesuaikan
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 10 // Supaya angka lebih rapih
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
