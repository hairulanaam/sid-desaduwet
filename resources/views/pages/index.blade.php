@extends('layouts.app', [
    'title' => 'Pemerintah Desa Duwet',
    'active' => 'Beranda',
    'page' => 'Beranda',
])

@section('content')
<section class="relative bg-cover w-full h-screen bg-hero flex">
    <div class="absolute inset-0 bg-black bg-opacity-40 z-0"></div>
    
    <div class="justify-center items-center text-center mx-auto text-white flex z-10 flex-col">
        <p class="sm:text-5xl text-3xl font-bold">Selamat Datang</p>
        <p class="sm:text-5xl text-3xl font-bold mt-3">Website Desa <span class="py-0 px-1 bg-[#2dba48] sm:rounded-lg rounded-md sm:text-[44px] text-3xl">{{ $informasidesas->nama_desa }}</span></p>
        <p class="sm:text-[16px] text-[15px] mt-1">Sumber informasi terbaru tentang pemerintahan di Desa <span>{{ $informasidesas->nama_desa }}</span></p>

        <div class="flex flex-wrap justify-center items-center gap-3 mt-6">
            @foreach ($layanans as $layanan)
            @php
            $routes = [
                'Profil' => route('sejarah'),
                'Struktur' => route('strukturorganisasi'),
                'Berita' => route('beritadesa'),
                'E-Doc' => route('unduhan'),
                'Statistik' => route('pekerjaan'),
                'Layanan' => route('agenda'),
            ];
            $url = $routes[$layanan['jenis']] ?? '#';
        @endphp
            <a href="{{ $url }}" class="group">
                <div class="flex-col py-2 w-24 rounded-lg bg-white group-hover:bg-transparent shadow-md bg-opacity-90 backdrop-blur-sm items-center justify-center flex">
                    <img src="{{ asset($layanan['icon']) }}" alt="{{ $layanan['jenis'] }}" class="h-8 w-auto object-contain">
                    <p class="text-[14px] text-center font-medium text-black group-hover:text-white">{{ $layanan['jenis'] }}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="grid lg:grid-cols-3 grid-cols-1 space-x-7 max-lg:space-x-0 max-lg:space-y-4 sm:mx-16 mx-4 my-16">
        {{-- Layout Kiri --}}
        <div class="col-span-2 space-y-5 bg-white rounded-lg sm:p-4 p-2">
            <p class="text-xl text-black font-semibold leading-none">Berita Terkini Desa</p>
            <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg"></div>

            @foreach($beritaDesa as $berita)
                <div class="flex sm:flex-row flex-col gap-3 items-center">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Berita Desa" class="h-48 sm:w-72 w-full object-cover bg-center rounded-lg">
                    <div class="flex-col space-y-3">
                        <p class="font-semibold text-[20px] text-black text-justify leading-tight line-clamp-2">{{ $berita->judul }}</p>
                        <div class="flex items-center gap-4">
                            <div class="flex gap-1 items-center">
                                <img src="{{ asset('assets/vector/calendar.png') }}" alt="Kalender" class="h-4 w-auto object-contain">
                                <p class="text-[14px] text-[#b0b0b0]">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('l, d F Y') }}</p>
                            </div>
                            <div class="flex items-center gap-1">
                                <img src="{{ asset('assets/vector/user.png') }}" alt="Penulis" class="h-4 w-auto">
                                <p class="text-[15px] text-[#b0b0b0] text-justify">{{ $berita->penulis }}</p>
                            </div>
                        </div>
                        <p class="text-[14px] text-[#b0b0b0] text-justify line-clamp-3">{{ $berita->deskripsi }}</p>
                        <a href="">
                            <div class="flex gap-1 items-center mt-2">
                                <p class="text-[14px] font-semibold hover:underline">Baca Selengkapnya</p>
                                <img src="{{ asset('assets/vector/arrow-right.png') }}" alt="Arrow" class="h-4 w-auto">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>
            @endforeach       
        </div>

        {{-- Layout Kanan --}}
        <div class="col-span-1 gap-5 flex flex-col bg-white rounded-lg sm:p-4 p-2">
            <div class="space-y-4">
                <p class="text-xl text-black font-semibold leading-none">Informasi Tentang Desa</p>
                <div class="w-[70px] bg-[#35b242] h-[2px] rounded-lg"></div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/users.png') }}" alt="Penduduk" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Penduduk</p>
                        <p class="text-[14px] text-[#b0b0b0]"><span>{{ number_format($informasidesas->penduduk, 0, ',', '.') }}</span> Jiwa</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/family.png') }}" alt="Kepala Keluarga" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Kepala Keluarga (KK)</p>
                        <p class="text-[14px] text-[#b0b0b0]"><span>{{ $informasidesas->kepala_keluarga }}</span> KK</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/houses.png') }}" alt="Dusun" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah Dusun</p>
                        <p class="text-[14px] text-[#b0b0b0]"><span>{{ $informasidesas->dusun }}</span> Dusun</p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/home.png') }}" alt="RT/RW" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Jumlah RT/RW</p>
                        <p class="text-[14px] text-[#b0b0b0]"><span>{{ $informasidesas->rt_rw }}</span></p>
                    </div>
                </div>

                <div class="flex gap-2 items-center">
                    <img src="{{ asset('assets/vector/map.png') }}" alt="Wilayah" class="h-12 w-auto p-3 object-contain rounded-full bg-[#ccfbcc]">
                    <div class="flex-col">
                        <p class="text-[16px] font-medium leading-tight mt-1">Luas Wilayah</p>
                        <p class="text-[14px] text-[#b0b0b0]"><span>{{ number_format($informasidesas->luas_wilayah, 0, ',', '.') }}</span> Ha</p>
                    </div>
                </div>
            </div>
            <div class="bg-gray-200 w-full h-[1px] rounded-full"></div>
            <div class="flex-col space-y-3">
                <p class="text-xl text-black font-semibold leading-none">Peta Desa</p>
                <div class="w-[40px] bg-[#35b242] h-[2px] rounded-lg"></div>
                <iframe 
                    class="w-full h-[300px] md:h-[350px] rounded-lg"
                    src="{{ $informasidesas->peta_desa }}" 
                    style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

<section class="my-10 sm:mx-16 mx-4">
    <div class="items-start flex flex-col">
        <p class="text-2xl text-black font-semibold leading-none">Struktur Pejabat Desa</p>
        <div class="w-[70px] bg-[#35b242] my-4 h-[2px] rounded-lg"></div>
    </div>
    <div class="swiper" id="perangkatDesa">
        <div class="swiper-wrapper">

            @foreach ($perangkatdesas as $perangkatdesa)
            <div class="swiper-slide group">
                <div class="bg-gray-200 rounded-lg justify-center h-[270px] w-auto flex relative group-hover:bg-[#00df82] transition-colors">
                    <img src="{{ asset('storage/' . $perangkatdesa->gambar) }}" alt="{{ $perangkatdesa->nama }}" class="max-h-full w-auto object-contain pt-3">
                    <div class="bg-[#00df82] hover:bg-white hover:text-[#00df82] text-white shadow-lg absolute rounded-lg bottom-2 w-[85%] mx-auto text-center py-2 transition-colors group-hover:bg-white group-hover:text-[#00df82]">
                        <p class="font-semibold text-[18px]">{{ $perangkatdesa->nama }}</p>
                        <p class="text-[14px] -mt-1">{{ $perangkatdesa->jabatan }}</p>
                    </div>
                </div>
            </div>
            @endforeach

            
        </div>
        <div class="pt-12">
            <div class="swiper-pagination hidden sm:block "></div>
        </div>
    </div>
</section>


<section class="my-14 sm:mx-16 mx-4">
    <div class="items-start flex flex-col">
        <p class="text-2xl text-black font-semibold leading-none">Potensi Desa</p>
        <div class="w-[70px] bg-[#35b242] my-4 h-[2px] rounded-lg"></div>
    </div>
    
    {{-- POTENSI DESA --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 justify-center">
        <a href="potensi/bidang-pariwisata">
            <div class="relative group">
                <img src="{{ asset('/assets/images/village.jpg') }}" alt="Potensi Desa" class="w-full sm:h-96 h-52 object-cover rounded-lg">
                <div class="absolute left-0 bottom-0 w-full sm:h-[40%] h-[50%] bg-gradient-to-t from-black to-transparent rounded-b-lg flex flex-col items-start justify-end p-3">
                    <p class="text-white text-[16px] font-medium">Bidang Pariwisata</p>
                </div>

                <div class="absolute inset-0 rounded-lg bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('/assets/images/village.jpg') }}" class="h-10 w-auto object-contain">
                    <p class="text-white text-[12px] font-medium mt-1">Lihat selengkapnya</p>
                </div>
            </div>
        </a>
        <a href="potensi/bidang-pertanian">
            <div class="relative group">
                <img src="{{ asset('/assets/images/village.jpg') }}" alt="Potensi Desa" class="w-full sm:h-96 h-52 object-cover rounded-lg">
                <div class="absolute left-0 bottom-0 w-full sm:h-[40%] h-[50%] bg-gradient-to-t from-black to-transparent rounded-b-lg flex flex-col items-start justify-end p-3">
                    <p class="text-white text-[16px] font-medium">Bidang Pertanian</p>
                </div>

                <div class="absolute inset-0 rounded-lg bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('assets/vector/right.png') }}" class="h-10 w-auto object-contain">
                    <p class="text-white text-[12px] font-medium mt-1">Lihat selengkapnya</p>
                </div>
            </div>
        </a>
        <a href="potensi/bidang-perikanan">
            <div class="relative group">
                <img src="{{ asset('/assets/images/village.jpg') }}" alt="Potensi Desa" class="w-full sm:h-96 h-52 object-cover rounded-lg">
                <div class="absolute left-0 bottom-0 w-full sm:h-[40%] h-[50%] bg-gradient-to-t from-black to-transparent rounded-b-lg flex flex-col items-start justify-end p-3">
                    <p class="text-white text-[16px] font-medium">Bidang Perikanan</p>
                </div>

                <div class="absolute inset-0 rounded-lg bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('assets/vector/right.png') }}" class="h-10 w-auto object-contain">
                    <p class="text-white text-[12px] font-medium mt-1">Lihat selengkapnya</p>
                </div>
            </div>
        </a>
        <a href="potensi/bidang-industri">
            <div class="relative group">
                <img src="{{ asset('/assets/images/village.jpg') }}" alt="Potensi Desa" class="w-full sm:h-96 h-52 object-cover rounded-lg">
                <div class="absolute left-0 bottom-0 w-full sm:h-[40%] h-[50%] bg-gradient-to-t from-black to-transparent rounded-b-lg flex flex-col items-start justify-end p-3">
                    <p class="text-white text-[16px] font-medium">Bidang Industri</p>
                </div>

                <div class="absolute inset-0 rounded-lg bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('assets/vector/right.png') }}" class="h-10 w-auto object-contain">
                    <p class="text-white text-[12px] font-medium mt-1">Lihat selengkapnya</p>
                </div>
            </div>
        </a>
        <a href="potensi/bidang-perkebunan">
            <div class="relative group">
                <img src="{{ asset('/assets/images/village.jpg') }}" alt="Potensi Desa" class="w-full sm:h-96 h-52 object-cover rounded-lg">
                <div class="absolute left-0 bottom-0 w-full sm:h-[40%] h-[50%] bg-gradient-to-t from-black to-transparent rounded-b-lg flex flex-col items-start justify-end p-3">
                    <p class="text-white text-[16px] font-medium">Bidang Perkebunan</p>
                </div>

                <div class="absolute inset-0 rounded-lg bg-black bg-opacity-50 flex flex-col items-center justify-center opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                    <img src="{{ asset('assets/vector/right.png') }}" class="h-10 w-auto object-contain">
                    <p class="text-white text-[12px] font-medium mt-1">Lihat selengkapnya</p>
                </div>
            </div>
        </a>

    </div>
    
    
</section>

<section class="my-24 mx-16 max-sm:mx-4 max-lg:gap-4 gap-0 kegiatandesa flex max-md:flex-col flex-row items-center space-x-5 justify-center">
    <div class="items-start flex flex-col w-[40%] max-lg:w-full max-lg:pr-0 pr-6">
        <p class="text-2xl text-black font-semibold">Kegiatan Desa</p>
        <div class="w-[70px] bg-[#35b242] my-4 h-[2px] rounded-lg"></div>
        <p class="text-[15px] text-black leading-normal text-justify">Desa Duwet selalu aktif mengadakan berbagai kegiatan yang melibatkan seluruh masyarakat. Dari gotong royong membersihkan lingkungan, pelatihan kewirausahaan bagi UMKM, hingga festival budaya yang melestarikan tradisi lokal. Setiap kegiatan dirancang untuk mempererat kebersamaan dan mendorong kemajuan desa menuju masa depan yang lebih baik. </p>
    </div>

    <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/petanimudakeren_/" data-instgrm-version="12" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:undefinedpx;height:undefinedpx;max-height:100%; width:undefinedpx;"><div style="padding:16px;"> <a id="main_link" href="petanimudakeren_/" style=" background:#FFFFFF; line-height:0; padding:0 0; text-align:center; text-decoration:none; width:100%;" target="_blank"> <div style=" display: flex; flex-direction: row; align-items: center;"> <div style="background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 40px; margin-right: 14px; width: 40px;"></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 100px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 60px;"></div></div></div><div style="padding: 19% 0;"></div> <div style="display:block; height:50px; margin:0 auto 12px; width:50px;"><svg width="50px" height="50px" viewBox="0 0 60 60" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><g transform="translate(-511.000000, -20.000000)" fill="#000000"><g><path d="M556.869,30.41 C554.814,30.41 553.148,32.076 553.148,34.131 C553.148,36.186 554.814,37.852 556.869,37.852 C558.924,37.852 560.59,36.186 560.59,34.131 C560.59,32.076 558.924,30.41 556.869,30.41 M541,60.657 C535.114,60.657 530.342,55.887 530.342,50 C530.342,44.114 535.114,39.342 541,39.342 C546.887,39.342 551.658,44.114 551.658,50 C551.658,55.887 546.887,60.657 541,60.657 M541,33.886 C532.1,33.886 524.886,41.1 524.886,50 C524.886,58.899 532.1,66.113 541,66.113 C549.9,66.113 557.115,58.899 557.115,50 C557.115,41.1 549.9,33.886 541,33.886 M565.378,62.101 C565.244,65.022 564.756,66.606 564.346,67.663 C563.803,69.06 563.154,70.057 562.106,71.106 C561.058,72.155 560.06,72.803 558.662,73.347 C557.607,73.757 556.021,74.244 553.102,74.378 C549.944,74.521 548.997,74.552 541,74.552 C533.003,74.552 532.056,74.521 528.898,74.378 C525.979,74.244 524.393,73.757 523.338,73.347 C521.94,72.803 520.942,72.155 519.894,71.106 C518.846,70.057 518.197,69.06 517.654,67.663 C517.244,66.606 516.755,65.022 516.623,62.101 C516.479,58.943 516.448,57.996 516.448,50 C516.448,42.003 516.479,41.056 516.623,37.899 C516.755,34.978 517.244,33.391 517.654,32.338 C518.197,30.938 518.846,29.942 519.894,28.894 C520.942,27.846 521.94,27.196 523.338,26.654 C524.393,26.244 525.979,25.756 528.898,25.623 C532.057,25.479 533.004,25.448 541,25.448 C548.997,25.448 549.943,25.479 553.102,25.623 C556.021,25.756 557.607,26.244 558.662,26.654 C560.06,27.196 561.058,27.846 562.106,28.894 C563.154,29.942 563.803,30.938 564.346,32.338 C564.756,33.391 565.244,34.978 565.378,37.899 C565.522,41.056 565.552,42.003 565.552,50 C565.552,57.996 565.522,58.943 565.378,62.101 M570.82,37.631 C570.674,34.438 570.167,32.258 569.425,30.349 C568.659,28.377 567.633,26.702 565.965,25.035 C564.297,23.368 562.623,22.342 560.652,21.575 C558.743,20.834 556.562,20.326 553.369,20.18 C550.169,20.033 549.148,20 541,20 C532.853,20 531.831,20.033 528.631,20.18 C525.438,20.326 523.257,20.834 521.349,21.575 C519.376,22.342 517.703,23.368 516.035,25.035 C514.368,26.702 513.342,28.377 512.574,30.349 C511.834,32.258 511.326,34.438 511.181,37.631 C511.035,40.831 511,41.851 511,50 C511,58.147 511.035,59.17 511.181,62.369 C511.326,65.562 511.834,67.743 512.574,69.651 C513.342,71.625 514.368,73.296 516.035,74.965 C517.703,76.634 519.376,77.658 521.349,78.425 C523.257,79.167 525.438,79.673 528.631,79.82 C531.831,79.965 532.853,80.001 541,80.001 C549.148,80.001 550.169,79.965 553.369,79.82 C556.562,79.673 558.743,79.167 560.652,78.425 C562.623,77.658 564.297,76.634 565.965,74.965 C567.633,73.296 568.659,71.625 569.425,69.651 C570.167,67.743 570.674,65.562 570.82,62.369 C570.966,59.17 571,58.147 571,50 C571,41.851 570.966,40.831 570.82,37.631"></path></g></g></g></svg></div><div style="padding-top: 8px;"> <div style=" color:#3897f0; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:550; line-height:18px;"> View this post on Instagram</div></div><div style="padding: 12.5% 0;"></div> <div style="display: flex; flex-direction: row; margin-bottom: 14px; align-items: center;"><div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(0px) translateY(7px);"></div> <div style="background-color: #F4F4F4; height: 12.5px; transform: rotate(-45deg) translateX(3px) translateY(1px); width: 12.5px; flex-grow: 0; margin-right: 14px; margin-left: 2px;"></div> <div style="background-color: #F4F4F4; border-radius: 50%; height: 12.5px; width: 12.5px; transform: translateX(9px) translateY(-18px);"></div></div><div style="margin-left: 8px;"> <div style=" background-color: #F4F4F4; border-radius: 50%; flex-grow: 0; height: 20px; width: 20px;"></div> <div style=" width: 0; height: 0; border-top: 2px solid transparent; border-left: 6px solid #f4f4f4; border-bottom: 2px solid transparent; transform: translateX(16px) translateY(-4px) rotate(30deg)"></div></div><div style="margin-left: auto;"> <div style=" width: 0px; border-top: 8px solid #F4F4F4; border-right: 8px solid transparent; transform: translateY(16px);"></div> <div style=" background-color: #F4F4F4; flex-grow: 0; height: 12px; width: 16px; transform: translateY(-4px);"></div> <div style=" width: 0; height: 0; border-top: 8px solid #F4F4F4; border-left: 8px solid transparent; transform: translateY(-4px) translateX(8px);"></div></div></div> <div style="display: flex; flex-direction: column; flex-grow: 1; justify-content: center; margin-bottom: 24px;"> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; margin-bottom: 6px; width: 224px;"></div> <div style=" background-color: #F4F4F4; border-radius: 4px; flex-grow: 0; height: 14px; width: 144px;"></div></div></a><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="petanimudakeren_/" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">Shared post</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;">Time</time></p></div></blockquote><script src="https://www.instagram.com/embed.js"></script><script type="text/javascript" src="https://www.embedista.com/j/instagramfeed1907.js"></script><div style="overflow: auto; position: absolute; height: 0pt; width: 0pt;"><a href="https://www.embedista.com/instagramfeed">Embed Instagram Post</a> Code Generator</div></div><style>.boxes3{height:175px;width:153px;} #n img{max-height:none!important;max-width:none!important;background:none!important} #inst i{max-height:none!important;max-width:none!important;background:none!important}</style></div>
    
    {{-- <div class="swiper" id="kegiatanDesa">
        <div class="swiper-wrapper">
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
            <div class="swiper-slide ">
                <img src="{{ asset('assets/images/berita.jpg') }}" alt="Perangkat Desa" class="">
            </div>
        </div>
        <div class="pt-12">
            <div class="swiper-pagination hidden sm:block "></div>
        </div>
    </div> --}}
</section>
@endsection