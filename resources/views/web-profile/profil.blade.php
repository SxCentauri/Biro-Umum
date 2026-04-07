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
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 800)">

    <div x-show="loading" class="fixed inset-0 z- flex flex-col items-center justify-center bg-white">
        <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-b-4 border-blue-600 mb-4"></div>
        <div class="text-blue-900 font-bold text-sm animate-pulse">Memuat Profil...</div>
    </div>

    <div x-show="!loading" x-transition.opacity.duration.500ms class="flex flex-col min-h-screen">

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
                        <span class="inline-block py-1 px-3 rounded-full bg-blue-50 text-blue-600 font-bold tracking-wider uppercase text-[10px] md:text-xs mb-4">Tentang Kami</span>
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6 leading-tight">Mendukung Kinerja Pimpinan Daerah dengan Pelayanan Prima</h2>
                        <p class="text-gray-600 mb-4 leading-relaxed text-justify text-sm md:text-base">
                            Biro Umum Sekretariat Daerah Provinsi Bengkulu merupakan unsur staf yang bertugas membantu Sekretaris Daerah dalam menyusun kebijakan dan mengkoordinasikan urusan ketatausahaan, rumah tangga pimpinan, serta keprotokolan.
                        </p>
                        <p class="text-gray-600 mb-6 md:mb-8 leading-relaxed text-justify text-sm md:text-base">
                            Kami berkomitmen untuk menyediakan fasilitas dan layanan terbaik guna memastikan kelancaran kegiatan pemerintahan di lingkungan Pemerintah Provinsi Bengkulu secara transparan dan akuntabel.
                        </p>

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
                    <p class="mt-4 text-sm md:text-base text-gray-600 font-medium">Susunan Hierarki Pejabat Biro Umum Setda Provinsi Bengkulu 2026.</p>
                </div>

                <div class="flex flex-col items-center w-full">

                    <div class="relative z-10 flex flex-col items-center w-full">
                        <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white rounded-2xl shadow-xl p-5 md:p-6 w-[95%] max-w-[320px] border-4 border-blue-100 transform transition hover:-translate-y-1">
                            <div class="w-16 h-16 md:w-20 md:h-20 mx-auto bg-white rounded-full flex items-center justify-center mb-3 md:mb-4 shadow-inner">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-blue-800" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            </div>
                            <h3 class="font-extrabold text-sm md:text-base tracking-wide uppercase">A. GUNAWAN, S.Sos</h3>
                            <p class="text-yellow-400 font-medium text-xs md:text-sm mt-1">Kepala Biro Umum</p>
                            <div class="mt-3 pt-3 border-t border-blue-700/50 text-[10px] md:text-xs text-blue-200">
                                Pembina Utama Muda (IV/c)<br>
                                NIP. 197102041992021001
                            </div>
                        </div>
                    </div>

                    <div class="hidden lg:flex flex-col items-center w-full">
                        <div class="w-px h-8 bg-gray-400"></div>
                        <div class="w-full relative h-px bg-gray-400" style="max-width: 66.666%;">
                            <div class="absolute left-0 top-0 w-px h-8 bg-gray-400"></div>
                            <div class="absolute left-1/2 top-0 w-px h-8 bg-gray-400 transform -translate-x-1/2"></div>
                            <div class="absolute right-0 top-0 w-px h-8 bg-gray-400"></div>
                        </div>
                    </div>

                    <div class="w-full grid grid-cols-1 lg:grid-cols-3 gap-y-10 lg:gap-x-4 mt-8 lg:mt-0 pt-0 lg:pt-8 relative z-10">

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10">
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase break-words">ETIZA MILIANTIKA, ST</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase">Kabag Adm. Keuangan & Aset</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500">
                                    Penata Tk.I (III/d)<br>
                                    NIP. 198709042011012007
                                </div>
                            </div>

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">VERA MERYANNA, SE</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Kasubbag Perencanaan dan Anggaran</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198105022005022003</div>
                                    </div>
                                </div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">HAMDAN AZHARI, S.IP., M.Si</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Tim Kerja Akutansi & Penatausahaan Keu & Aset</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198608202006041007</div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">HARMUDIA, SH</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Ketua Tim Kerja Perbendaharaan</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 197906152005021004</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10">
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase break-words">BUDI TRAPSILO, S.IP</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase">Kabag Rumah Tangga</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500">
                                    Penata Tk.I (III/d)<br>
                                    NIP. 198308252010011013
                                </div>
                            </div>

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">ARDIANSYAH, S.STP, M.Si</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Kasubbag Tata Usaha & Layanan Umum</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 199007072010101002</div>
                                    </div>
                                </div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">SRI WAHYUNI, S.KM</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Ketua Tim Kerja Rumah Tangga Pimpinan</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198404282006042012</div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">MUHAMAD TARMIDI, A.Md</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Tim Kerja Perlengkapan & Pemeliharaan Aset</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198205162009021003</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full">
                            <div class="block lg:hidden mb-4 text-blue-300">
                                <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
                            </div>

                            <div class="bg-white border-2 border-blue-100 rounded-xl shadow-lg p-4 w-[95%] max-w-[320px] hover:shadow-xl transition hover:border-blue-400 z-10">
                                <h4 class="font-bold text-gray-800 text-xs sm:text-sm uppercase break-words">EKA HAFIZH S., S.STP, M.Si</h4>
                                <p class="text-blue-600 font-bold text-[10px] sm:text-xs mt-1 uppercase">Kabag Protokol & Adm. Pimpinan</p>
                                <div class="mt-2 pt-2 border-t border-gray-100 text-[10px] text-gray-500">
                                    Pembina (IV/a)<br>
                                    NIP. 198703162006021001
                                </div>
                            </div>

                            <div class="relative w-[90%] max-w-[300px] mt-4 pl-4 sm:pl-6 text-left">
                                <div class="absolute left-0 sm:left-2 top-0 bottom-6 w-0.5 bg-gray-300"></div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">SRI RAHAYU, SH., MH</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Ketua Tim Kerja Hubungan Keprotokolan</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198205252009022003</div>
                                    </div>
                                </div>

                                <div class="relative mb-3">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">ALDI SUHENDRA, SE</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Ketua Tim Kerja Protokol & Pelayanan Tamu</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 197811182010011005</div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <div class="absolute -left-4 sm:-left-6 top-1/2 w-4 sm:w-6 h-0.5 bg-gray-300 transform -translate-y-1/2"></div>
                                    <div class="bg-white border border-gray-200 rounded-lg p-3 shadow-sm hover:border-blue-300 transition group">
                                        <h5 class="font-bold text-gray-800 text-[11px] sm:text-xs uppercase group-hover:text-blue-700 break-words">VETI NOVERA, S.E</h5>
                                        <p class="text-gray-600 text-[10px] sm:text-[11px] mt-0.5 font-medium leading-tight">Ketua Tim Kerja Administrasi Pimpinan</p>
                                        <div class="mt-1 text-[9px] sm:text-[10px] text-gray-400 leading-tight">Penata Tk.I (III/d)<br>NIP. 198011242005022004</div>
                                    </div>
                                </div>
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">BIRO UMUM</h3>
                    <p class="text-gray-400 mb-4 text-sm leading-relaxed">
                        Sekretariat Daerah Provinsi Bengkulu. <br>
                        Melayani kebutuhan rumah tangga pimpinan, <br>
                        keprotokolan, dan administrasi keuangan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.072 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2 inline-block">Tautan Cepat</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Pemerintah Provinsi Bengkulu</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Layanan LPSE</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Jaringan Dokumentasi Hukum</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Login Admin/Pegawai</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2 inline-block">Hubungi Kami</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Jl. Pembangunan No. 1, Padang Harapan, Kota Bengkulu, 38225
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            (0736) 21xxx
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            biroumum@bengkuluprov.go.id
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Biro Umum Kantor Gubernur Provinsi Bengkulu. All rights reserved.
            </div>
        </div>
    </footer>

    </div>

</body>
</html>
