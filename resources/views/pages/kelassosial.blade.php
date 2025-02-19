@extends('layouts.app', [
    'title' => 'Kelas Sosial Desa Duwet',
    'active' => 'kelassosial',
    'page' => 'kelassosial',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-3xl font-bold mt-3">Kelas Sosial Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-3xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- KONTEN LEMBAGA & TABEL -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center">
                Kelas Sosial DESA DUWET KECAMATAN PANARUKAN, KABUPATEN Situbondo, Jawa Timur
            </h1>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-[#42c85f] text-white text-center">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Nama Kelas</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah Keluarga</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($kelasSosial as $index => $kelasSosial)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kelasSosial->nama_kelas }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kelasSosial->jumlah_keluarga }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data agama
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CHART BAGIAN -->
        <div
            class="w-full md:w-2/3 lg:w-1/2 xl:w-1/3 mx-auto bg-white shadow-md rounded-lg p-6 mt-6 flex flex-col items-center">
            <h2 class="text-lg font-bold text-gray-800 text-center mb-4">Statistik Kelas Sosial</h2>
            <div class="w-[400px] h-[400px]">
                <canvas id="kelasSosialChart"></canvas>
            </div>
        </div>
    </div>

    <!-- CHART.JS & PLUGIN CHART DATA LABELS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('kelasSosialChart').getContext('2d');

            var labels = {!! json_encode($kelasSosial->pluck('nama_kelas')) !!};
            var dataValues = {!! json_encode($kelasSosial->pluck('jumlah_keluarga')) !!};
            var total = dataValues.reduce((a, b) => a + b, 0);

            var backgroundColors = [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)'
            ];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: backgroundColors,
                        borderColor: backgroundColors.map(color => color.replace('0.6', '1')),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // **Supaya chart tidak terlalu kecil**
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        datalabels: {
                            color: '#000',
                            font: {
                                size: 14,
                                weight: 'bold'
                            },
                            formatter: (value, context) => {
                                return ((value / total) * 100).toFixed(1) +
                                "%"; // **Menampilkan persen saja**
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
@endsection
