@extends('layouts.app', [
    'title' => 'Pemerintah Desa Duwet',
    'active' => 'Beranda',
    'page' => 'Beranda',
])

@section('content')
<section class="relative bg-cover w-full h-screen bg-hero flex">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    
    <div class="justify-center items-center mx-auto text-white flex z-10 flex-col">
        <p class="text-5xl font-bold">Selamat Datang</p>
        <p class="text-5xl font-bold mt-3">Website Desa <span class="py-0 px-1 bg-[#2dba48] rounded-lg text-[44px]">Duwet</span></p>
        <p class="text-[16px] mt-1">Sumber informasi terbaru tentang pemerintahan di Desa Duwet</p>

        <div class="flex justify-center items-center gap-3 mt-6">
            @foreach ($layanans as $layanan)
            <a href="#">
                <div class="flex-col py-2 w-24 rounded-lg bg-white hover:bg-transparent shadow-md bg-opacity-90 backdrop-blur-sm items-center justify-center flex">
                    <img src="{{ asset($layanan['icon']) }}" alt="{{ $layanan['jenis'] }}" class="h-8 w-auto object-contain">
                    <p class="text-[15px] text-center text-slate-400">{{ $layanan['jenis'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="grid grid-cols-3 gap-7 mx-16 my-16">
        {{-- Layout Kiri --}}
        <div class="col-span-2 space-y-5">
            <p class="text-xl text-black font-medium">Berita Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg"></div>

            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa" class="h-52 w-72 object-cover bg-center">
                <div class="flex-col space-y-3">
                    <p class="font-semibold text-[22px] text-black text-justify leading-tight">Gotong Royong Memperbaiki Jalan di Daerah Sekitar Pantai</p>
                    <div class="flex items-center gap-4">
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">11 Desember 2023</p>
                        </div>
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">Administrator</p>
                        </div>
                    </div>
                    <p class="text-[15px] text-[#b0b0b0] text-justify">DESA DATARA - Warga Dusun Pattabakkang Desa Datara melaksanakan kegiatan gotong royong memperbaiki Jalan Usaha Tani (JUT) yang berada di</p>
                    <a href="">
                        <div class="flex gap-2 items-center mt-2">
                            <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>

            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa" class="h-52 w-72 object-cover bg-center">
                <div class="flex-col space-y-3">
                    <p class="font-semibold text-[22px] text-black text-justify leading-tight">Gotong Royong Memperbaiki Jalan di Daerah Sekitar Pantai</p>
                    <div class="flex items-center gap-4">
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">11 Desember 2023</p>
                        </div>
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">Administrator</p>
                        </div>
                    </div>
                    <p class="text-[15px] text-[#b0b0b0] text-justify">DESA DATARA - Warga Dusun Pattabakkang Desa Datara melaksanakan kegiatan gotong royong memperbaiki Jalan Usaha Tani (JUT) yang berada di</p>
                    <a href="">
                        <div class="flex gap-2 items-center mt-2">
                            <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>

            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa" class="h-52 w-72 object-cover bg-center">
                <div class="flex-col space-y-3">
                    <p class="font-semibold text-[22px] text-black text-justify leading-tight">Gotong Royong Memperbaiki Jalan di Daerah Sekitar Pantai</p>
                    <div class="flex items-center gap-4">
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">11 Desember 2023</p>
                        </div>
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">Administrator</p>
                        </div>
                    </div>
                    <p class="text-[15px] text-[#b0b0b0] text-justify">DESA DATARA - Warga Dusun Pattabakkang Desa Datara melaksanakan kegiatan gotong royong memperbaiki Jalan Usaha Tani (JUT) yang berada di</p>
                    <a href="">
                        <div class="flex gap-2 items-center mt-2">
                            <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>

            <div class="flex gap-3 items-center">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Berita Desa" class="h-52 w-72 object-cover bg-center">
                <div class="flex-col space-y-3">
                    <p class="font-semibold text-[22px] text-black text-justify leading-tight">Gotong Royong Memperbaiki Jalan di Daerah Sekitar Pantai</p>
                    <div class="flex items-center gap-4">
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">11 Desember 2023</p>
                        </div>
                        <div class="flex gap-1 items-center">
                            <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto object-contain">
                            <p class="text-[15px] text-[#b0b0b0]">Administrator</p>
                        </div>
                    </div>
                    <p class="text-[15px] text-[#b0b0b0] text-justify">DESA DATARA - Warga Dusun Pattabakkang Desa Datara melaksanakan kegiatan gotong royong memperbaiki Jalan Usaha Tani (JUT) yang berada di</p>
                    <a href="">
                        <div class="flex gap-2 items-center mt-2">
                            <p class="text-[15px] font-semibold hover:underline">Baca Selengkapnya</p>
                            <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-5 w-auto">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Layout Kanan --}}
        <div class="col-span-1 gap-5 flex flex-col">
            <div class="space-y-4">
                <p class="text-xl text-black font-medium">Informasi Tentang Desa</p>
                <div class="w-[70px] bg-[#35b242] h-[2px] rounded-lg"></div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/profil.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Penduduk</p>
                    <p class="text-[15px] text-[#b0b0b0]">2.757 Jiwa</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/profil.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Kepala Keluarga (KK)</p>
                        <p class="text-[15px] text-[#b0b0b0]">691 KK</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/profil.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Dusun</p>
                        <p class="text-[15px] text-[#b0b0b0]">5 Dusun</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/profil.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah RT/RW</p>
                        <p class="text-[15px] text-[#b0b0b0]">18/6</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/profil.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Luas Wilayah</p>
                        <p class="text-[15px] text-[#b0b0b0]">75.350 Ha</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>
            <div class="flex-col space-y-3">
                <p class="text-xl text-black font-medium">Peta Desa</p>
                <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg"></div>
                <iframe 
                    class="w-full max-w-full h-[300px] md:h-[400px]"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.2743087363237!2d113.98497447376343!3d-7.653625975722968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd72f2de6c88c65%3A0xcd7c6e014f0e24c5!2sKANTOR%20DESA%20DUWET!5e0!3m2!1sid!2sid!4v1738891604502!5m2!1sid!2sid" 
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="swiper" id="potensiDesa">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                {{-- <div class="bg-white rounded-3xl shadow-md flex flex-col justify-center items-center text-center h-auto w-auto">
                    <div class="bg-white flex justify-center py-7 max-sm:py-5 rounded-t-3xl w-full border-b">
                        <img src="{{ asset($product['vector']) }}" alt="{{ $product['produk'] }}" class="max-sm:h-[110px] max-md:h-[130px] h-36 w-auto">
                    </div>

                    <div class="max-sm:px-3 px-4 max-sm:py-3 py-4 text-center flex flex-col flex-grow">
                        <h2 class="max-sm:text-[16px] text-[17px] font-semibold text-black items-center justify-center flex">{{ $product['produk'] }}</h2>
                        <p class="max-sm:mt-2 mt-3 text-[14px] text-[#70787D] max-sm:leading-tight max-lg:min-h-[90px] min-h-[75px]">
                            {{ $product['deskripsi'] }}
                        </p>
                        <a href="{{ $product['link'] }}" class="max-md:mt-4 mt-4 bg-[#75BADB] text-white rounded-full max-sm:w-full font-semibold text-sm max-sm:text-[13px] px-4 py-2 shadow self-center">
                            Pelajari Selengkapnya
                        </a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
@endsection