@extends('layouts.app', [
    'title' => 'Profil Penduduk',
    'active' => 'profil',
    'page' => 'Profil',
])

@section('content')
    @php
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
    @endphp
    <!-- Main Container with Sidebar and Content -->
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar - Non-sticky dan tidak menabrak navbar -->
        <div id="sidebar"
            class="fixed md:relative inset-y-0 left-0 transform -translate-x-full md:translate-x-0 z-40 w-64 bg-white shadow-md transition-transform duration-300 ease-in-out overflow-y-auto md:h-auto mt-16">
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
                        class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-md mb-2 transition-colors duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">Dashboard</span>
                    </a>
                    <a href="{{ route('dashboardprofil') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-teal-50 text-teal-700 rounded-md mb-2 transition-colors duration-200 hover:bg-teal-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span class="font-medium">Profil</span>
                    </a>
                    <div class="border-t my-2"></div>
                    <!-- Tombol Logout -->
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
            <!-- Profil Header -->
            <div class="mb-6 pt-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Profil Penduduk</h1>
                <p class="text-gray-600">Informasi data diri Anda</p>
            </div>

            <!-- Profil Section -->
            <div class="bg-white rounded-lg shadow-sm mb-6">
                <div class="p-5 border-b">
                    <h2 class="text-xl font-semibold text-gray-800">Data Diri</h2>
                    <p class="text-sm text-gray-500 mt-1">Detail informasi data diri Anda</p>
                </div>

                <div class="p-6">
                    <!-- Informasi Profil dalam Format Read-Only -->
                    <div class="space-y-6">
                        <!-- NIK -->

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">NIK</label>
                                <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                    {{ $user->nik ?? 'Tidak ada data' }}
                                </div>
                            </div>
                        

                        <!-- Nama Lengkap -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->nama_lengkap ?? 'Tidak ada data' }}
                            </div>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->locale('id')->translatedFormat('d F Y') : 'Tidak ada data' }}
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->jenis_kelamin == 'L' ? 'Laki-Laki' : ($user->jenis_kelamin == 'P' ? 'Perempuan' : 'Tidak ada data') }}
                            </div>
                        </div>

                        <!-- Agama -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Agama</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->agama ?? 'Tidak ada data' }}
                            </div>
                        </div>

                        <!-- Pendidikan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pendidikan</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->pendidikan ?? 'Tidak ada data' }}
                            </div>
                        </div>

                        <!-- Pekerjaan -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                            <div class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5">
                                {{ $user->pekerjaan ?? 'Tidak ada data' }}
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <div
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2.5 min-h-[80px]">
                                {{ $user->alamat ?? 'Tidak ada data' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


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
