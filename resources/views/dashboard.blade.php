@extends('layouts.app', [
    'title' => 'Dashboard Desa Duwet',
    'active' => 'dashboard',
    'page' => 'Dashboard',
])

@section('content')
    @php
        use App\Models\RequestSurat;
        use Illuminate\Support\Facades\Auth;

        // Ambil NIK pengguna yang sedang login
        $userNik = Auth::user()->nik;

        // Ambil data surat berdasarkan NIK pengguna
        $surats = RequestSurat::where('nik', $userNik)->orderBy('created_at', 'desc')->paginate(10);

        $totalSurat = RequestSurat::where('nik', $userNik)->count();
        $totalSelesai = RequestSurat::where('nik', $userNik)->where('status', 'selesai')->count();
    @endphp
    <!-- Main Container with Sidebar and Content -->
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar - Non-sticky dan tidak menabrak navbar -->
        <div id="sidebar"
            class="fixed md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 z-40 w-64 bg-white transition-transform duration-300 ease-in-out overflow-y-auto md:h-auto mt-16">
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
                            <h3 class="font-semibold text-gray-800">{{ Auth::user()->nama_lengkap }}</h3>
                            <p class="text-xs text-gray-500">{{ Auth::user()->nik }}</p>
                        </div>
                    </div>
                </div>
                <nav class="p-2 overflow-y-auto flex-grow">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-teal-50 text-teal-700 rounded-md mb-2 transition-colors duration-200 hover:bg-teal-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('dashboardprofil') }}"
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-md mb-2 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium">Profil</span>
                    </a>
                    <div class="border-t my-2"></div>
                    <!-- Tombol Logout yang Diperbaiki -->
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit"
                            class="flex items-center gap-3 px-4 py-3 text-red-600 hover:bg-red-50 rounded-md transition-colors duration-200 w-full text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="font-medium">Keluar</span>
                        </button>
                    </form>
                </nav>
            </div>
        </div>

        <!-- Overlay for mobile sidebar -->
        <div id="sidebar-overlay"
            class="fixed inset-0 bg-black bg-opacity-50 opacity-0 pointer-events-none transition-opacity duration-300 ease-in-out md:hidden z-30">
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
                            <h3 class="text-3xl font-bold text-gray-800">{{ $totalSurat ?? '0' }}</h3>
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
                            <h3 class="text-3xl font-bold text-gray-800">{{ $totalSelesai ?? '0' }}</h3>
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
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    NO
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
                            @forelse($surats as $key => $surat)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $surats->firstItem() + $key }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{ $surat->no_surat ?? 'Belum diproses' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $surat->jenis_surat }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($surat->status == 'diminta')
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Diminta</span>
                                        @elseif($surat->status == 'diproses')
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
                                        @elseif($surat->status == 'selesai')
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                        @elseif($surat->status == 'diantar')
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">Diantar</span>
                                        @elseif($surat->status == 'ditolak')
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>
                                        @else
                                            <span
                                                class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">{{ $surat->status }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::parse($surat->created_at)->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Tidak ada data
                                        surat</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col sm:flex-row items-center justify-between p-4 border-t gap-4">
                    <!-- Informasi jumlah entri - responsif -->
                    <div class="text-sm text-gray-500 text-center sm:text-left order-2 sm:order-1 w-full sm:w-auto">
                        <span>Menampilkan {{ $surats->firstItem() ?? 0 }}-{{ $surats->lastItem() ?? 0 }} dari
                            {{ $surats->total() ?? 0 }} entri</span>
                    </div>

                    <!-- Tombol pagination - responsif -->
                    <div class="flex items-center justify-center space-x-1 order-1 sm:order-2 w-full sm:w-auto">
                        <!-- Tombol Previous dengan panah -->
                        <a href="{{ $surats->previousPageUrl() }}"
                            class="{{ $surats->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }} flex items-center justify-center px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-l border h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>

                        <!-- Tombol Halaman - Responsif dengan tampilan yang lebih compact untuk layar kecil -->
                        @php
                            // Batasi jumlah halaman yang ditampilkan pada layar kecil
                            $windowSize = 3; // Jumlah tombol nomor halaman yang ditampilkan
                            $halfWindow = floor($windowSize / 2);

                            $startPage = max(1, $surats->currentPage() - $halfWindow);
                            $endPage = min($surats->lastPage(), $surats->currentPage() + $halfWindow);

                            // Pastikan selalu menampilkan $windowSize halaman jika tersedia
                            if ($endPage - $startPage + 1 < $windowSize && $surats->lastPage() >= $windowSize) {
                                if ($startPage == 1) {
                                    $endPage = min($windowSize, $surats->lastPage());
                                } elseif ($endPage == $surats->lastPage()) {
                                    $startPage = max(1, $surats->lastPage() - $windowSize + 1);
                                }
                            }
                        @endphp

                        @for ($i = $startPage; $i <= $endPage; $i++)
                            <a href="{{ $surats->url($i) }}"
                                class="flex items-center justify-center px-2 py-1 border h-8 w-8 {{ $surats->currentPage() == $i ? 'bg-teal-600 text-white' : 'bg-gray-100 hover:bg-gray-200 text-gray-800' }}">
                                {{ $i }}
                            </a>
                        @endfor

                        <!-- Tombol Next dengan panah -->
                        <a href="{{ $surats->nextPageUrl() }}"
                            class="{{ $surats->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }} flex items-center justify-center px-2 py-1 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-r border h-8 w-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Toggle Button - Fixed at the bottom for mobile -->
            <!-- Mobile Toggle Button - Dengan aria-label untuk aksesibilitas -->
            <button id="mobile-toggle" aria-label="Toggle Sidebar"
                class="fixed bottom-4 right-4 md:hidden bg-teal-600 text-white p-4 rounded-full shadow-lg z-50 focus:outline-none focus:ring-2 focus:ring-teal-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <!-- JavaScript for Mobile Sidebar Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Seleksi elemen-elemen yang diperlukan
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebar-overlay');
            const mobileToggle = document.getElementById('mobile-toggle');
            const contentArea = document.getElementById('content-area');

            // Fungsi untuk membuka sidebar
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
                if (window.innerWidth >= 768) {
                    contentArea.classList.add('md:ml-64');
                }
            }

            // Fungsi untuk menutup sidebar
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                contentArea.classList.remove('md:ml-64');
            }

            // Fungsi toggle sidebar
            function toggleSidebar() {
                if (sidebar.classList.contains('-translate-x-full')) {
                    openSidebar();
                } else {
                    closeSidebar();
                }
            }

            // Event listener untuk tombol toggle mobile
            mobileToggle.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event propagasi ke document
                toggleSidebar();
            });

            // Event listener untuk overlay
            sidebarOverlay.addEventListener('click', function(event) {
                event.stopPropagation(); // Mencegah event propagasi ke document
                closeSidebar();
            });

            // Event listener untuk resize window
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 768) {
                    // Untuk desktop
                    sidebar.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    // Untuk mobile - tutup sidebar secara default
                    if (!sidebar.classList.contains('-translate-x-full')) {
                        closeSidebar();
                    }
                }
            });

            // Mencegah klik di sidebar menutup sidebar
            sidebar.addEventListener('click', function(event) {
                event.stopPropagation(); // Menghentikan propagasi event agar tidak sampai ke document
            });

            // Inisialisasi sesuai ukuran layar saat halaman dimuat
            if (window.innerWidth < 768) {
                closeSidebar();
            } else {
                // Hanya tampilkan sidebar, jangan aktifkan overlay
                sidebar.classList.remove('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
            }
        });
    </script>
@endsection