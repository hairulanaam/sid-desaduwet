@extends('layouts.app', [
    'title' => 'Kehamilan Desa Duwet',
    'active' => 'kehamilan',
    'page' => 'kehamilan',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-3xl font-bold mt-3">Kehamilan Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-3xl">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- KONTEN LEMBAGA & TABEL -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center">
                kehamilan DESA DUWET KECAMATAN PANARUKAN, KABUPATEN Situbondo, Jawa Timur
            </h1>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300 text-gray-800 text-sm sm:text-base">
                    <thead>
                        <tr class="bg-[#42c85f] text-white text-center">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Kategori</th>
                            <th class="border border-gray-300 px-4 py-2">Perempuan</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($kehamilan as $index => $kehamilanItem)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kehamilanItem->kategori }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kehamilanItem->perempuan }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $kehamilanItem->jumlah_penduduk }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data kehamilan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CHART BAGIAN -->
        <div
            class="w-full sm:w-3/4 md:w-2/3 lg:w-1/2 xl:w-1/3 mx-auto bg-white shadow-md rounded-lg p-6 mt-6 flex flex-col items-center">
            <h2 class="text-lg font-bold text-gray-800 text-center mb-4">Statistik Kehamilan</h2>
            <div class="w-full max-w-xs sm:max-w-sm md:max-w-md lg:max-w-lg xl:max-w-xl">
                <canvas id="kehamilanChart"></canvas>
            </div>
        </div>
    </div>


    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('kehamilanChart').getContext('2d');

            var labels = {!! json_encode($kehamilan->pluck('kategori')) !!};
            var dataValues = {!! json_encode($kehamilan->pluck('jumlah_penduduk')) !!};

            var total = dataValues.reduce((a, b) => a + b, 0);

            var backgroundColors = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ];

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: dataValues,
                        backgroundColor: backgroundColors.slice(0, labels.length),
                        borderColor: backgroundColors.slice(0, labels.length).map(color => color.replace('0.7', '1')),
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
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
                                return ((value / total) * 100).toFixed(1) + "%";
                            }
                        }
                    }
                },
                plugins: [ChartDataLabels]
            });
        });
    </script>
@endsection
