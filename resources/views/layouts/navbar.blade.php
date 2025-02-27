<style>
    /* Add smooth transitions for the mobile menu */
    #mobileNav {
        transition: opacity 0.3s ease-in-out;
        display: flex;
        flex-direction: column;
        height: 100vh;
        overflow-y: auto;
    }

    #mobileNav.hidden {
        opacity: 0;
        pointer-events: none;
    }

    #mobileNav:not(.hidden) {
        opacity: 1;
        pointer-events: all;
    }

    .rotate-180 {
        transform: rotate(180deg);
    }
</style>

<nav class="fixed bg-opacity-40 top-0 left-0 right-0 flex items-center py-3 px-4 md:px-20 bg-black z-30">

    {{-- Logo --}}
    <div class="flex items-center gap-x-2 lg:hidden xl:block">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-12 w-auto object-contain">
    </div>

    {{-- Mobile Navigation --}}
    <div class="ml-auto flex lg:hidden">
        <button id="burgerMenu" class="text-[#3986A3] focus:outline-none">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <line x1="4" y1="6" x2="20" y2="6" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                <line x1="4" y1="12" x2="20" y2="12" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
                <line x1="4" y1="18" x2="20" y2="18" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </button>
    </div>

    {{-- Mobile Navigation Menu --}}
    <div id="mobileNav" class="lg:hidden fixed inset-0 bg-black bg-opacity-75 z-40 hidden">
        <div class="flex justify-end p-4">
            <button id="closeMenu" class="text-white focus:outline-none">
                <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul class="flex flex-col items-center space-y-4 p-4 text-white">
            <li><a href="{{ route('home') }}" class="text-lg">Beranda</a></li>
            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('profilSubmenu')">
                    <a class="text-lg">Profil</a>
                    <svg id="profilArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <ul id="profilSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/profil/sejarah" class="text-sm">Sejarah</a></li>
                    <li><a href="/profil/katasambutan" class="text-sm">Sambutan</a></li>
                    <li><a href="/profil/visi-misi" class="text-sm">Visi & Misi</a></li>
                    <li><a href="/profil/struktur-organisasi" class="text-sm">Struktur Organisasi</a></li>
                    <li><a href="/profil/perangkat-desa" class="text-sm">Sumber Daya Manusia</a></li>
                    <li><a href="/profil/peta-desa" class="text-sm">Peta Desa</a></li>
                    <li><a href="/profil/lembaga-desa" class="text-sm">Lembaga Pemerintahan Desa</a></li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('publikasiSubmenu')">
                    <a class="text-lg">Publikasi</a>
                    <svg id="publikasiArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <ul id="publikasiSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/publikasi/agenda" class="text-sm">Agenda</a></li>
                    <li><a href="/publikasi/ppid-desa" class="text-sm">PPID Desa</a></li>
                    <li><a href="/publikasi/berita-desa" class="text-sm">Berita Desa</a></li>
                    <li><a href="/publikasi/galeri-kegiatan" class="text-sm">Galeri Kegiatan</a></li>
                    <li><a href="/publikasi/video-kegiatan" class="text-sm">Video Kegiatan</a></li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('potensiSubmenu')">
                    <a class="text-lg">Potensi Desa</a>
                    <svg id="potensiArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>
                <ul id="potensiSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/potensi/bidang-pariwisata" class="text-sm">Bidang Pariwisata</a></li>
                    <li><a href="/potensi/bidang-pertanian" class="text-sm">Bidang Pertanian</a></li>
                    <li><a href="/potensi/bidang-perikanan" class="text-sm">Bidang Perikanan</a></li>
                    <li><a href="/potensi/bidang-industri" class="text-sm">Bidang Industri</a></li>
                    <li><a href="/potensi/bidang-perkebunan" class="text-sm">Bidang Perkebunan</a></li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('statistikSubmenu')">
                    <a class="text-lg">Statistik</a>
                    <svg id="statistikArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>
                <ul id="statistikSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/statistik/jumlah-penduduk" class="text-sm">Jumlah Penduduk</a></li>
                    <li><a href="/statistik/pekerjaan" class="text-sm">Pekerjaan</a></li>
                    <li><a href="/statistik/pendidikan" class="text-sm">Pendidikan</a></li>
                    <li><a href="/statistik/status-perkawinan" class="text-sm">Status Perkawinan</a></li>
                    <li><a href="/statistik/golongan-darah" class="text-sm">Golongan Darah</a></li>
                    <li><a href="/statistik/agama" class="text-sm">Agama</a>
                    </li>
                    <li><a href="/statistik/kelas-sosial" class="text-sm">Kelas Sosial</a></li>
                    <li><a href="/statistik/jamkesmas" class="text-sm">Jamkesmas</a></li>
                    <li><a href="/statistik/program-keluarga-harapan" class="text-sm">Program Keluarga Harapan</a>
                    </li>
                    <li><a href="/statistik/kepala-keluarga" class="text-sm">Kepala Keluarga</a></li>
                    <li><a href="/statistik/gizi-buruk" class="text-sm">Gizi
                            Buruk</a></li>
                    <li><a href="/statistik/kehamilan" class="text-sm">Kehamilan</a></li>
                    <li><a href="/statistik/buruh-migran" class="text-sm">Buruh Migran</a></li>
                    <li><a href="/statistik/bantuan-siswa-miskin" class="text-sm">Bantuan Siswa Miskin</a></li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('edocSubmenu')">
                    <a class="text-lg">E-Doc</a>
                    <svg id="edocArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>
                <ul id="edocSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/e-doc/undang-undang" class="text-sm">Undang
                            Undang</a></li>
                    <li><a href="/e-doc/peraturan-bupati" class="text-sm">Peraturan Bupati</a></li>
                    <li><a href="/e-doc/peraturan-menteri" class="text-sm">Peraturan Menteri</a></li>
                    <li><a href="/e-doc/peraturan-pemerintah" class="text-sm">Peraturan Pemerintah</a></li>
                    <li><a href="/e-doc/peraturan-gubernur" class="text-sm">Peraturan Gubernur</a></li>
                    <li><a href="/e-doc/unduhan/" class="text-sm">Unduhan</a>
                    </li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('bumdesSubmenu')">
                    <a class="text-lg">Bumdes</a>
                    <svg id="bumdesArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>
                <ul id="bumdesSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/bumdes/usp-desa" class="text-sm">Usp</a>
                    </li>
                    <li><a href="/bumdes/profil-bumdes" class="text-sm">Profil Bumdes</a></li>
                    <li><a href="/bumdes/direksi-bumdes" class="text-sm">Direksi Bumdes</a></li>
                    <li><a href="/bumdes/jenis-usaha" class="text-sm">Jenis
                            Usaha</a></li>
                </ul>
            </li>

            <li class="relative">
                <div class="flex items-center gap-x-1 cursor-pointer" onclick="toggleSubmenu('apbdesSubmenu')">
                    <a class="text-lg">APBDes</a>
                    <svg id="apbdesArrow" class="w-4 h-4 text-white transform transition-transform duration-200"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>
                <ul id="apbdesSubmenu" class="mt-2 space-y-2 pl-4 hidden submenu">
                    <li><a href="/apbdes/infografis-desa" class="text-sm">Infografis APBDes Desa Duwet</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    {{-- Navigation --}}
    <div id="navLinks" class="hidden lg:flex ml-auto items-center">
        <ul class="flex gap-x-4 md:gap-x-9 items-center p-2 text-sm md:text-[15px] font-medium">
            <li>
                <a href="{{ route('home') }}"
                    class="@if ($active == 'Beranda') text-[#35b242] border-b-2 pb-1.5 border-[#35b242] @else text-white @endif">Beranda</a>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Profil
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/profil/sejarah" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sejarah</a>
                    </li>
                    <li><a href="/profil/katasambutan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sambutan</a></li>
                    <li><a href="/profil/visi-misi" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Visi &
                            Misi</a></li>
                    <li><a href="/profil/struktur-organisasi"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Struktur Organisasi</a></li>
                    <li><a href="/profil/perangkat-desa"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sumber Daya Manusia</a></li>
                    <li><a href="/profil/peta-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peta
                            Desa</a></li>
                    <li><a href="/profil/lembaga-desa"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Lembaga Pemerintahan Desa</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Publikasi
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/publikasi/agenda"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Agenda</a></li>
                    <li><a href="/publikasi/ppid-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">PPID
                            Desa</a></li>
                    <li><a href="/publikasi/berita-desa"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Berita Desa</a></li>
                    <li><a href="/publikasi/galeri-kegiatan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Galeri Kegiatan</a></li>
                    <li><a href="/publikasi/video-kegiatan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Video Kegiatan</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Potensi Desa
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/potensi/bidang-pariwisata"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Pariwisata</a></li>
                    <li><a href="/potensi/bidang-pertanian"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Pertanian</a></li>
                    <li><a href="/potensi/bidang-perikanan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Perikanan</a></li>
                    <li><a href="/potensi/bidang-industri"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Industri</a></li>
                    <li><a href="/potensi/bidang-perkebunan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Perkebunan</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Statistik
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/statistik/jumlah-penduduk"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Jumlah Penduduk</a></li>
                    <li><a href="/statistik/pekerjaan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Pekerjaan</a></li>
                    <li><a href="/statistik/pendidikan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Pendidikan</a></li>
                    <li><a href="/statistik/status-perkawinan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Status Perkawinan</a></li>
                    <li><a href="/statistik/golongan-darah"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Golongan Darah</a></li>
                    <li><a href="/statistik/agama" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Agama</a>
                    </li>
                    <li><a href="/statistik/kelas-sosial"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kelas Sosial</a></li>
                    <li><a href="/statistik/jamkesmas"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Jamkesmas</a></li>
                    <li><a href="/statistik/program-keluarga-harapan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Program Keluarga Harapan</a></li>
                    <li><a href="/statistik/kepala-keluarga"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kepala Keluarga</a></li>
                    <li><a href="/statistik/gizi-buruk" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Gizi
                            Buruk</a></li>
                    <li><a href="/statistik/kehamilan"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kehamilan</a></li>
                    <li><a href="/statistik/buruh-migran"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Buruh Migran</a></li>
                    <li><a href="/statistik/bantuan-siswa-miskin"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bantuan Siswa Miskin</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        E-Doc
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/e-doc/undang-undang" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Undang
                            Undang</a></li>
                    <li><a href="/e-doc/peraturan-bupati"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Bupati</a></li>
                    <li><a href="/e-doc/peraturan-menteri"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Menteri</a></li>
                    <li><a href="/e-doc/peraturan-pemerintah"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Pemerintah</a></li>
                    <li><a href="/e-doc/peraturan-gubernur"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Gubernur</a></li>
                    <li><a href="/e-doc/unduhan/" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Unduhan</a>
                    </li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Bumdes
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>
                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/bumdes/usp-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Usp</a>
                    </li>
                    <li><a href="/bumdes/profil-bumdes"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Profil Bumdes</a></li>
                    <li><a href="/bumdes/direksi-bumdes"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Direksi Bumdes</a></li>
                    <li><a href="/bumdes/jenis-usaha" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Jenis
                            Usaha</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        APBDes
                    </a>
                    <svg class="w-3 h-3 md:w-4 md:h-4 text-white transform transition-transform duration-200 group-hover:rotate-180"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                        </path>
                    </svg>

                </div>

                <ul
                    class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                    <li><a href="/apbdes/infografis-desa"
                            class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Infografis APBDes Desa Duwet</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const burgerMenu = document.getElementById('burgerMenu');
        const closeMenu = document.getElementById('closeMenu');
        const mobileNav = document.getElementById('mobileNav');

        burgerMenu.addEventListener('click', function() {
            mobileNav.classList.remove('hidden');
        });

        closeMenu.addEventListener('click', function() {
            mobileNav.classList.add('hidden');
        });
    });

    function toggleSubmenu(submenuId) {
        const submenu = document.getElementById(submenuId);
        const arrow = document.getElementById(submenuId.replace('Submenu', 'Arrow'));

        // Tutup semua submenu yang terbuka
        document.querySelectorAll('.submenu').forEach(function(item) {
            if (item.id !== submenuId && !item.classList.contains('hidden')) {
                item.classList.add('hidden');
                const otherArrow = document.getElementById(item.id.replace('Submenu', 'Arrow'));
                if (otherArrow) {
                    otherArrow.classList.remove('rotate-180');
                }
            }
        });

        if (submenu.classList.contains('hidden')) {
            submenu.classList.remove('hidden');
            arrow.classList.add('rotate-180'); // Rotate arrow
        } else {
            submenu.classList.add('hidden');
            arrow.classList.remove('rotate-180'); // Reset arrow
        }
    }
</script>
