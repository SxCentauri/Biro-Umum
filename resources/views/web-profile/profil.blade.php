<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Kami - Biro Umum Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        /* Style untuk area visi-misi (WYSIWYG format) */
        .misi-content ul { list-style-type: disc; margin-left: 1.5rem; }
        .misi-content li { margin-bottom: 0.5rem; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 800)">

    <div x-show="loading" class="fixed inset-0 z- flex flex-col items-center justify-center bg-white">
        <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-b-4 border-blue-600 mb-4"></div>
        <div class="text-blue-900 font-bold text-sm animate-pulse">Memuat Profil...</div>
    </div>

    <div x-show="!loading" x-cloak x-transition.opacity.duration.500ms class="flex flex-col flex-grow">

        @include('web-profile.layouts.navbar')

        <div class="bg-blue-900 py-10 md:py-16 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">Profil Biro Umum</h1>
                <nav class="flex justify-center text-sm text-blue-200">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('web.home') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li class="text-white font-semibold">Profil</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="py-12 md:py-16 bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-10 md:gap-12">
                    <div class="w-full lg:w-1/2">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-white group w-full">
                            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?q=80&w=800&auto=format&fit=crop" alt="Meeting Biro Umum" class="w-full h-auto transform group-hover:scale-105 transition duration-700">
                            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-blue-900 via-blue-900/80 to-transparent p-6 pt-12">
                                <p class="text-white font-bold text-lg md:text-xl drop-shadow-md">Profesional & Melayani</p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2">
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 font-bold tracking-wider uppercase text-[10px] md:text-xs mb-4">Visi & Misi</span>

                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6 leading-tight">
                            {{ $visiMisi->visi ?? 'Visi Belum Diatur' }}
                        </h2>

                        <div class="text-gray-600 mb-6 md:mb-8 leading-relaxed text-justify text-sm md:text-base misi-content">
                            {!! $visiMisi->misi ?? '<p>Misi belum diatur.</p>' !!}
                        </div>

                        <div class="grid grid-cols-3 gap-4 md:gap-6 border-t border-gray-100 pt-6">
                            <div>
                                <span class="block text-3xl md:text-4xl font-extrabold text-blue-600 mb-1">3</span>
                                <span class="text-[10px] md:text-xs text-gray-500 font-semibold uppercase tracking-wide">Bagian Utama</span>
                            </div>
                            <div>
                                <span class="block text-3xl md:text-4xl font-extrabold text-blue-600 mb-1">50+</span>
                                <span class="text-[10px] md:text-xs text-gray-500 font-semibold uppercase tracking-wide">Pegawai ASN</span>
                            </div>
                            <div>
                                <span class="block text-3xl md:text-4xl font-extrabold text-blue-600 mb-1">24/7</span>
                                <span class="text-[10px] md:text-xs text-gray-500 font-semibold uppercase tracking-wide">Siap Melayani</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 md:py-20 bg-gray-50 border-t border-gray-100 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="mb-10 md:mb-16">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Struktur Organisasi</h2>
                    <div class="w-16 md:w-20 h-1.5 bg-blue-600 mx-auto mt-4 rounded-full"></div>
                    <p class="mt-4 text-sm md:text-base text-gray-600 font-medium">Susunan Hierarki Pejabat Biro Umum Setda Provinsi Bengkulu.</p>
                </div>

                <div class="flex flex-col items-center w-full">

                    @if($kepala)
                    <div class="relative z-10 flex flex-col items-center w-full">
                        <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white rounded-2xl shadow-xl p-5 md:p-6 w-[95%] max-w-[320px] border-4 border-blue-100 transform transition hover:-translate-y-1">

                            <div class="w-20 h-20 md:w-24 md:h-24 mx-auto bg-white rounded-full flex items-center justify-center mb-4 shadow-inner overflow-hidden border-2 border-white">
                                @if($kepala->foto)
                                    <img src="{{ asset('storage/' . $kepala->foto) }}" alt="Foto {{ $kepala->nama }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-10 h-10 text-blue-800/30" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                @endif
                            </div>

                            <h3 class="font-extrabold text-sm md:text-base tracking-wide uppercase">{{ $kepala->nama }}</h3>
                            <p class="text-yellow-400 font-bold text-xs md:text-sm mt-1 uppercase">{{ $kepala->jabatan }}</p>
                            <div class="mt-3 pt-3 border-t border-blue-700/50 text-[10px] md:text-xs text-blue-200">
                                {{ $kepala->pangkat_golongan }}<br>
                                NIP. {{ $kepala->nip }}
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="hidden lg:flex flex-col items-center w-full">
                        <div class="w-px h-8 bg-gray-400"></div>
                        <div class="w-full relative h-px bg-gray-400" style="max-width: 66.666%;">
                            <div class="absolute left-0 top-0 w-px h-8 bg-gray-400"></div>
                            <div class="absolute left-1/2 top-0 w-px h-8 bg-gray-400 transform -translate-x-1/2"></div>
                            <div class="absolute right-0 top-0 w-px h-8 bg-gray-400"></div>
                        </div>
                    </div>

                    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-y-12 lg:gap-x-4 mt-8 lg:mt-0 pt-0 lg:pt-8 relative z-10">

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            @if($kabagRt)
                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10 flex flex-col items-center">
                                <div class="w-14 h-14 bg-gray-100 rounded-full mb-3 flex items-center justify-center overflow-hidden border border-gray-200">
                                    @if($kabagRt->foto)
                                        <img src="{{ asset('storage/' . $kabagRt->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    @endif
                                </div>
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase text-center">{{ $kabagRt->nama }}</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase text-center">{{ $kabagRt->jabatan }}</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500 text-center w-full">
                                    {{ $kabagRt->pangkat_golongan }}<br>NIP. {{ $kabagRt->nip }}
                                </div>
                            </div>
                            @endif

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                @foreach($subRt as $sub)
                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-100 rounded-md flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-200">
                                            @if($sub->foto)
                                                <img src="{{ asset('storage/' . $sub->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 leading-tight">{{ $sub->nama }}</h5>
                                            <p class="text-gray-600 text-[9px] sm:text-[10px] mt-0.5 font-semibold leading-tight">{{ $sub->jabatan }}</p>
                                            <div class="mt-1 text-[8px] sm:text-[9px] text-gray-400 leading-tight">{{ $sub->pangkat_golongan }} | NIP. {{ $sub->nip }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            @if($kabagKeuangan)
                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10 flex flex-col items-center">
                                <div class="w-14 h-14 bg-gray-100 rounded-full mb-3 flex items-center justify-center overflow-hidden border border-gray-200">
                                    @if($kabagKeuangan->foto)
                                        <img src="{{ asset('storage/' . $kabagKeuangan->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    @endif
                                </div>
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase text-center">{{ $kabagKeuangan->nama }}</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase text-center">{{ $kabagKeuangan->jabatan }}</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500 text-center w-full">
                                    {{ $kabagKeuangan->pangkat_golongan }}<br>NIP. {{ $kabagKeuangan->nip }}
                                </div>
                            </div>
                            @endif

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                @foreach($subKeuangan as $sub)
                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-100 rounded-md flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-200">
                                            @if($sub->foto)
                                                <img src="{{ asset('storage/' . $sub->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 leading-tight">{{ $sub->nama }}</h5>
                                            <p class="text-gray-600 text-[9px] sm:text-[10px] mt-0.5 font-semibold leading-tight">{{ $sub->jabatan }}</p>
                                            <div class="mt-1 text-[8px] sm:text-[9px] text-gray-400 leading-tight">{{ $sub->pangkat_golongan }} | NIP. {{ $sub->nip }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            @if($kabagProtokol)
                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10 flex flex-col items-center">
                                <div class="w-14 h-14 bg-gray-100 rounded-full mb-3 flex items-center justify-center overflow-hidden border border-gray-200">
                                    @if($kabagProtokol->foto)
                                        <img src="{{ asset('storage/' . $kabagProtokol->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                    @endif
                                </div>
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase text-center">{{ $kabagProtokol->nama }}</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase text-center">{{ $kabagProtokol->jabatan }}</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500 text-center w-full">
                                    {{ $kabagProtokol->pangkat_golongan }}<br>NIP. {{ $kabagProtokol->nip }}
                                </div>
                            </div>
                            @endif

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                @foreach($subProtokol as $sub)
                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group flex items-center gap-3">
                                        <div class="w-10 h-10 bg-gray-100 rounded-md flex-shrink-0 flex items-center justify-center overflow-hidden border border-gray-200">
                                            @if($sub->foto)
                                                <img src="{{ asset('storage/' . $sub->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                            @else
                                                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            @endif
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 leading-tight">{{ $sub->nama }}</h5>
                                            <p class="text-gray-600 text-[9px] sm:text-[10px] mt-0.5 font-semibold leading-tight">{{ $sub->jabatan }}</p>
                                            <div class="mt-1 text-[8px] sm:text-[9px] text-gray-400 leading-tight">{{ $sub->pangkat_golongan }} | NIP. {{ $sub->nip }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 md:py-20 bg-blue-900 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-blue-800 rounded-full opacity-50 blur-3xl"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center mb-10 md:mb-16">
                    <h2 class="text-2xl md:text-3xl font-bold">Tugas Pokok & Fungsi</h2>
                    <p class="text-blue-200 mt-2 font-medium text-sm md:text-lg">Berdasarkan Peraturan Gubernur Bengkulu.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 md:p-8 rounded-2xl hover:bg-white/20 transition duration-300 group">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mb-5 md:mb-6 text-blue-900 font-black text-xl md:text-2xl shadow-lg transform group-hover:-translate-y-2 transition">1</div>
                        <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4 text-white">Bagian Adm. Keuangan & Aset</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Melaksanakan penyiapan bahan perumusan kebijakan, pengoordinasian, pembinaan, fasilitasi, pemantauan, evaluasi administrasi keuangan, dan penatausahaan aset biro.
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 md:p-8 rounded-2xl hover:bg-white/20 transition duration-300 group">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mb-5 md:mb-6 text-blue-900 font-black text-xl md:text-2xl shadow-lg transform group-hover:-translate-y-2 transition">2</div>
                        <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4 text-white">Bagian Rumah Tangga</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Melaksanakan urusan rumah tangga pimpinan, pengelolaan aset persediaan, pemeliharaan gedung kantor, sarana prasarana, keamanan, serta kebersihan lingkungan Setda.
                        </p>
                    </div>

                    <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-6 md:p-8 rounded-2xl hover:bg-white/20 transition duration-300 group">
                        <div class="w-12 h-12 md:w-14 md:h-14 bg-gradient-to-br from-yellow-400 to-yellow-500 rounded-xl flex items-center justify-center mb-5 md:mb-6 text-blue-900 font-black text-xl md:text-2xl shadow-lg transform group-hover:-translate-y-2 transition">3</div>
                        <h3 class="text-lg md:text-xl font-bold mb-3 md:mb-4 text-white">Bagian Protokol & Adm. Pimpinan</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">
                            Menyiapkan pelaksanaan acara pimpinan, pengaturan tata tempat, tata upacara, dan tata penghormatan kepada pejabat negara, tamu daerah, serta administrasi pimpinan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-gray-900 text-white border-t-4 border-yellow-500 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl md:text-2xl font-bold text-white mb-3 md:mb-4">BIRO UMUM</h3>
                        <p class="text-gray-400 mb-4 text-sm leading-relaxed">
                            Sekretariat Daerah Provinsi Bengkulu. <br>
                            Melayani kebutuhan rumah tangga pimpinan, <br>
                            keprotokolan, dan administrasi keuangan.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg font-bold text-white mb-3 md:mb-4 border-b border-gray-700 pb-2 inline-block">Tautan Cepat</h3>
                        <ul class="space-y-2 text-gray-400 text-sm">
                            <li><a href="#" class="hover:text-yellow-400 transition flex items-center"><span class="mr-2">→</span> Pemerintah Provinsi Bengkulu</a></li>
                            <li><a href="{{ route('login') }}" class="hover:text-yellow-400 transition flex items-center"><span class="mr-2">→</span> Login Admin/Pegawai</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg font-bold text-white mb-3 md:mb-4 border-b border-gray-700 pb-2 inline-block">Hubungi Kami</h3>
                        <ul class="space-y-3 md:space-y-4 text-gray-400 text-sm">
                            <li class="flex items-start">
                                Jl. Pembangunan No. 1, Padang Harapan, Bengkulu
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-800 mt-10 md:mt-12 pt-6 md:pt-8 text-center text-xs md:text-sm text-gray-500">
                    &copy; {{ date('Y') }} Biro Umum Kantor Gubernur Provinsi Bengkulu. All rights reserved.
                </div>
            </div>
        </footer>

    </div>

</body>
</html>
