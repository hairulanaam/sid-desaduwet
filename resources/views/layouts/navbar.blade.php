<nav class="fixed bg-opacity-40 top-0 left-0 right-0 flex items-center py-3 px-20 bg-black z-30">

{{-- <nav class="fixed top-0 left-0 right-0 max-sm:mx-4 mx-14 flex items-center max-sm:px-4 px-4 max-sm:py-2 py-2.5 bg-white bg-opacity-90 backdrop-blur-sm rounded-3xl shadow-md z-30 mt-7"> --}}

    {{-- Logo --}}
    <div class="flex items-center gap-x-2">
        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="h-12 w-auto object-contain">
    </div>

    {{-- Mobile Navigation --}}
    <div class="ml-auto flex md:hidden">
        <button id="burgerMenu" class="text-[#3986A3] focus:outline-none">
            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                <line x1="4" y1="6" x2="20" y2="6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <line x1="4" y1="12" x2="20" y2="12" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <line x1="4" y1="18" x2="20" y2="18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </button>
    </div>

    {{-- Navigation --}}
    <div id="navLinks" class="hidden md:flex ml-auto items-center">
        <ul class="flex gap-x-9 items-center p-2  text-[15px] font-medium">
            <li>
                <a href="{{ route('home') }}" 
                class="@if ($active == 'Beranda') text-[#35b242] border-b-2 pb-1.5 border-[#35b242] @else text-white @endif">Beranda</a>
            </li>
            {{-- <li class="relative group cursor-pointer">
                <a class="text-white px-4 py-4 rounded focus:outline-none">
                    Profil
                </a>
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-2 w-48">
                    <li href="/page1" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sejarah</li>
                    <li href="/page2" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sambutan</li>
                    <li href="/page3" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Visi & Misi</li>
                    <li href="/page3" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Struktur Organisasi</li>
                    <li href="/page3" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sumber Daya Manusia</li>
                    <li href="/page3" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peta Desa</li>
                    <li href="/page3" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Lembaga Pemerintahan Desa</li>
                </ul>
            </li> --}}

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Profil
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-48">
                    <li><a href="/profil/sejarah" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sejarah</a></li>
                    <li><a href="/profil/katasambutan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sambutan</a></li>
                    <li><a href="/profil/visi-misi" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Visi & Misi</a></li>
                    <li><a href="/profil/struktur-organisasi" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Struktur Organisasi</a></li>
                    <li><a href="/profil/perangkat-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Sumber Daya Manusia</a></li>
                    <li><a href="/profil/peta-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peta Desa</a></li>
                    <li><a href="/profil/lembaga-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Lembaga Pemerintahan Desa</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Publikasi
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-48">
                    <li><a href="/publikasi/agenda" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Agenda</a></li>
                    <li><a href="/publikasi/ppid-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">PPID Desa</a></li>
                    <li><a href="/publikasi/berita-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Berita Desa</a></li>
                    <li><a href="/publikasi/galeri-kegiatan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Galeri Kegiatan</a></li>
                    <li><a href="/publikasi/video-kegiatan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Video Kegiatan</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Potensi Desa
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-48">
                    <li><a href="/potensi/bidang-pariwisata" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Pariwisata</a></li>
                    <li><a href="/potensi/bidang-pertanian" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Pertanian</a></li>
                    <li><a href="/potensi/bidang-perikanan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Perikanan</a></li>
                    <li><a href="/potensi/bidang-industri" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Industri</a></li>
                    <li><a href="/potensi/bidang-perkebunan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bidang Perkebunan</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Statistik
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-56">
                    <li><a href="/statistik/pekerjaan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Pekerjaan</a></li>
                    <li><a href="/statistik/pendidikan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Pendidikan</a></li>
                    <li><a href="/statistik/status-perkawinan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Status Perkawinan</a></li>
                    <li><a href="/statistik/golongan-darah" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Golongan Darah</a></li>
                    <li><a href="/statistik/agama" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Agama</a></li>
                    <li><a href="/statistik/kelas-sosial" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kelas Sosial</a></li>
                    <li><a href="/statistik/jamkesmas" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Jamkesmas</a></li>
                    <li><a href="/statistik/program-keluarga-harapan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Program Keluarga Harapan</a></li>
                    <li><a href="/statistik/kepala-keluarga" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kepala Keluarga</a></li>
                    <li><a href="/statistik/gizi-buruk" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Gizi Buruk</a></li>
                    <li><a href="/statistik/kehamilan" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Kehamilan</a></li>
                    <li><a href="/statistik/buruh-migran" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Buruh Migran</a></li>
                    <li><a href="/statistik/bantuan-siswa-miskin" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Bantuan Siswa Miskin</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        E-Doc
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-48">
                    <li><a href="/e-doc/undang-undang" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Undang Undang</a></li>
                    <li><a href="/e-doc/peraturan-bupati" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Bupati</a></li>
                    <li><a href="/e-doc/peraturan-menteri" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Menteri</a></li>
                    <li><a href="/e-doc/peraturan-pemerintah" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Pemerintah</a></li>
                    <li><a href="/e-doc/peraturan-gubernur" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Peraturan Gubernur</a></li>
                    <li><a href="/e-doc/unduhan/" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Unduhan</a></li>
                </ul>
            </li>
            
            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        Bumdes
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-48">
                    <li><a href="/bumdes/usp-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Usp</a></li>
                    <li><a href="/bumdes/profil-bumdes" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Profil Bumdes</a></li>
                    <li><a href="/bumdes/direksi-bumdes" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Direksi Bumdes</a></li>
                    <li><a href="/bumdes/jenis-usaha" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Jenis Usaha</a></li>
                </ul>
            </li>

            <li class="relative group cursor-pointer">
                <div class="flex items-center gap-x-1">
                    <a class="text-white rounded focus:outline-none">
                        APBDes
                    </a>
                    <svg class="w-4 h-4 text-white transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            
                <ul class="absolute hidden group-hover:block bg-white shadow-lg rounded mt-1 w-36">
                    <li><a href="/apbdes/infografis-desa" class="block px-4 py-2 text-gray-700 hover:bg-[#35b242]">Infografis APBDes Desa Duwet</a></li>
                </ul>
            </li>
        </ul>
    </div>


</nav>