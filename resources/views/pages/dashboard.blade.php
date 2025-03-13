@extends('layouts.app', [
    'title' => 'Dashboard Desa Duwet',
    'active' => 'dashboard',
    'page' => 'Dashboard',
])

@section('content')
    <!-- Main Container with Sidebar and Content -->
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar - Non-sticky dan tidak menabrak navbar -->
        <div id="sidebar"
            class="fixed md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 z-30 w-64 bg-white shadow-md transition-transform duration-300 ease-in-out overflow-y-auto md:h-auto mt-16">
            <!-- Sidebar content -->
            <div class="flex flex-col h-full py-6">
                <div class="px-4 pb-4 border-b">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-teal-600 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">User Desa Duwet</h3>
                            <p class="text-xs text-gray-500">1234123412341234</p>
                        </div>
                    </div>
                </div>
                <nav class="p-2 overflow-y-auto flex-grow">
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 bg-teal-50 text-teal-700 rounded-md mb-2 transition-colors duration-200 hover:bg-teal-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-md mb-2 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium">Profil</span>
                    </a>
                    <div class="border-t my-2"></div>
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-md transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium">Keluar</span>
                    </a>
                </nav>
            </div>
        </div>

        <!-- Overlay for mobile sidebar -->
        <div id="sidebar-overlay"
            class="fixed inset-0 opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out md:hidden z-50">
        </div>

        <!-- Main Content Area -->
        <div id="content-area"
            class="flex-1 transition-all duration-300 ease-in-out px-4 md:px-6 lg:px-8 pb-16 overflow-x-hidden mt-16">
            <!-- Dashboard Header -->
            <div class="mb-6 pt-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Dashboard Desa Duwet</h1>
                <p class="text-gray-600">Sistem Manajemen Surat Desa</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">
                <!-- Total Surat Diajukan -->
                <div
                    class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500 transform transition-transform duration-200 hover:scale-105 w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <p class="text-sm text-gray-500 mb-2">Total Surat Diajukan</p>
                            <h3 class="text-3xl font-bold text-gray-800">124</h3>
                            <p class="text-xs text-gray-500 mt-3">Semua pengajuan surat</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center flex-shrink-0 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Total Surat Selesai -->
                <div
                    class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500 transform transition-transform duration-200 hover:scale-105 w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex-1">
                            <p class="text-sm text-gray-500 mb-2">Total Surat Selesai</p>
                            <h3 class="text-3xl font-bold text-gray-800">81</h3>
                            <p class="text-xs text-gray-500 mt-3">Surat yang telah diproses</p>
                        </div>
                        <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center flex-shrink-0 ml-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Table Section -->
            <div class="bg-white rounded-lg shadow-sm mb-6">
                <div class="flex flex-col md:flex-row items-center justify-between p-5 border-b">
                    <h2 class="text-xl font-semibold text-gray-800 mb-3 md:mb-0">Daftar Surat</h2>
                </div>

                <!-- Responsive Table -->
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nomor Surat</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Jenis Surat</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025/I/001</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Surat Keterangan Domisili
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Diminta</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">13 Mar 2025</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025/I/002</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Surat Pengantar KTP</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">12 Mar 2025</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025/I/003</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Surat Keterangan Usaha</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">11 Mar 2025</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">4</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025/I/004</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Surat Keterangan Tidak Mampu
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Mar 2025</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">5</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">2025/I/005</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Surat Keterangan Kelahiran
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">10 Mar 2025</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between p-4 border-t">
                    <div class="flex items-center text-sm text-gray-500">
                        <span>Menampilkan 1-5 dari 124 entri</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <button class="px-3 py-1 rounded bg-teal-600 text-white">1</button>
                        <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200">2</button>
                        <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200">3</button>
                        <button class="px-3 py-1 rounded bg-gray-100 text-gray-600 hover:bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Toggle Button - Fixed at the bottom for mobile -->
            <button id="mobile-toggle"
                class="fixed bottom-4 right-4 md:hidden bg-teal-600 text-white p-4 rounded-full shadow-lg z-50">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- JavaScript for mobile menu toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const mobileToggle = document.getElementById('mobile-toggle');

            mobileToggle.addEventListener('click', function() {
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('opacity-0');
                overlay.classList.toggle('pointer-events-none');
                overlay.classList.toggle('opacity-50'); // Tambahkan overlay lebih gelap
            });

            overlay.addEventListener('click', function() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                overlay.classList.add('pointer-events-none');
                overlay.classList.remove('opacity-50');
            });
        });
    </script>
@endsection
