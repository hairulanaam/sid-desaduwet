@extends('layouts.app', [
    'title' => 'Bantuan Siswa Miskin Desa Duwet',
    'active' => 'bantuansiswamiskin',
    'page' => 'bantuansiswamiskin',
])

@section('content')
    <section class="relative bg-cover w-full h-[50vh] bg-hero flex"
        style="background-image: url('{{ asset('/assets/images/village.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
        <div class="justify-center text-center items-center mx-auto text-white flex z-10 flex-col">
            <p class="sm:text-5xl text-2xl md:text-4xl font-bold mt-3">Bantuan Siswa Miskin Desa
                <span class="py-0 px-1 bg-[#2dba48] rounded-lg sm:text-[44px] text-2xl md:text-4xl ">Duwet</span>
            </p>
        </div>
    </section>

    <div class="container mx-auto px-6 py-12 flex flex-col items-center">
        <!-- KONTEN LEMBAGA & TABEL -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6">
            <h1 class="text-1xl uppercase font-bold mb-4 text-gray-800 text-center">
                Bantuan siswa miskin DESA DUWET KECAMATAN PANARUKAN, KABUPATEN Situbondo, Jawa Timur
            </h1>

            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-[#42c85f] text-white text-center">
                            <th class="border border-gray-300 px-4 py-2">No</th>
                            <th class="border border-gray-300 px-4 py-2">Kategori</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($bantuansiswamiskin as $index => $bantuansiswamiskinItem)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $bantuansiswamiskinItem->kategori }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $bantuansiswamiskinItem->jumlah }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                                    Belum ada data bantuan siswa miskin
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- CHART BAGIAN -->
        <div class="w-full md:w-2/3 bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-lg font-bold text-gray-800 text-center mb-4">Statistik Bantuan Siswa Miskin</h2>
            <div class="relative w-full h-[300px]"> <!-- Menyesuaikan ukuran grafik -->
                <canvas id="bantuansiswamiskinChart"></canvas>
            </div>
        </div>
    </div>


    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document.getElementById('bantuansiswamiskinChart').getContext('2d');

            var labels = {!! json_encode($bantuansiswamiskin->pluck('kategori')) !!};
            var dataValues = {!! json_encode($bantuansiswamiskin->pluck('jumlah')) !!};

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Jumlah",
                        data: dataValues,
                        backgroundColor: 'rgba(255, 99, 132, 0.7)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
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
