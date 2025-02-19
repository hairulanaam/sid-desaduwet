<footer class="bg-[#283138] w-full p-10">
    <div class="flex flex-col md:flex-row gap-4 mx-auto">
        <div class="flex-1 flex flex-col gap-5">
            <div class="flex gap-2 items-center">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Logo Desa Duwet"
                    title="Logo Desa Duwet" class="w-[40px]">
                <p class="text-xl font-bold text-white">Pemerintah Desa <span>{{ $informasidesas->nama_desa }}</span></p>
            </div>
            <p class="text-[15px] text-white text-justify">Duwet adalah desa yang berada di kecamatan Panarukan, Kabupaten Situbondo, Jawa Timur, Indonesia</p>
        </div>

        <div class="flex-1 flex flex-col gap-3 md:ml-10">
            <p class="text-lg font-bold text-white">Profil Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg -mt-2"></div>
            <div class="flex flex-col gap-2 text-white">
                <a href="#" class="text-[15px] hover:text-[#35b242]">Sejarah</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Sambutan</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Visi & Misi</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Struktur Organisasi</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Sumber Daya Manusia</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Peta Desa</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Lembaga Pemerintahan Desa</a>
            </div>
        </div>

        <div class="flex-1 flex flex-col gap-3 md:ml-10">    
            <p class="text-lg font-bold text-white">Publikasi Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg -mt-2"></div>
            <div class="flex flex-col gap-2 text-white">
                <a href="#" class="text-[15px] hover:text-[#35b242]">Agenda</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">PPID Desa</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Berita Desa</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Galeri Kegiatan</a>
                <a href="#" class="text-[15px] hover:text-[#35b242]">Video Kegiatan</a>
            </div>
        </div>

        <div class="flex-1 flex flex-col gap-3 md:ml-10">
            <p class="text-lg font-bold text-white">Hubungi Kami</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg -mt-2"></div>
            <div class="flex items-start gap-2">
                <img src="{{ asset('assets/vector/maps.png') }}" alt="Alamat" class="h-7 w-auto object-contain border rounded-full p-1.5">
                <p class="text-[15px] text-justify text-white -mt-1">{{ $informasidesas->alamat_desa }}</p>
            </div>
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/vector/phone.png') }}" alt="Telepon" class="h-7 w-auto object-contain border rounded-full p-1.5">
                <p class="text-[15px] text-justify text-white">{{ $informasidesas->telepon_desa }}</p>
            </div>
        </div>
    </div>
</footer>