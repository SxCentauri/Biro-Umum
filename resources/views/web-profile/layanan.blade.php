<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Layanan Kami - Biro Umum Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    @include('web-profile.layouts.navbar')

    <div class="bg-blue-900 py-12 md:py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Layanan Publik & Internal</h1>
            <p class="text-blue-200 text-sm md:text-base max-w-2xl mx-auto mb-6">
                Pusat informasi Standar Operasional Prosedur (SOP) dan portal pengaduan di lingkungan Biro Umum Sekretariat Daerah Provinsi Bengkulu.
            </p>
            <nav class="flex justify-center text-sm text-blue-300">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('web.home') }}" class="hover:text-white transition">Beranda</a></li>
                    <li><span class="mx-1">/</span></li>
                    <li class="text-white font-semibold">Layanan</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="py-16 bg-gray-50 flex-grow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 flex flex-col items-start group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-blue-50 rounded-bl-full -z-10 group-hover:bg-blue-100 transition duration-300"></div>
                    <div class="p-4 bg-blue-100 text-blue-600 rounded-xl mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi SOP</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed flex-grow">
                        Unduh dan pelajari Standar Operasional Prosedur terkait administrasi keuangan, keprotokolan, dan layanan rumah tangga pimpinan.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-blue-600 hover:text-blue-800 transition">
                        Lihat Daftar SOP
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 flex flex-col items-start group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-yellow-50 rounded-bl-full -z-10 group-hover:bg-yellow-100 transition duration-300"></div>
                    <div class="p-4 bg-yellow-100 text-yellow-600 rounded-xl mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Layanan Pengaduan</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed flex-grow">
                        Sampaikan kritik, saran, maupun laporan pengaduan terkait pelayanan publik dan kinerja aparatur di lingkungan Biro Umum.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-yellow-600 hover:text-yellow-700 transition">
                        Buat Laporan
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition duration-300 border border-gray-100 flex flex-col items-start group relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-bl-full -z-10 group-hover:bg-green-100 transition duration-300"></div>
                    <div class="p-4 bg-green-100 text-green-600 rounded-xl mb-6 group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Informasi Publik (PPID)</h3>
                    <p class="text-gray-500 text-sm mb-8 leading-relaxed flex-grow">
                        Akses layanan Pejabat Pengelola Informasi dan Dokumentasi (PPID) untuk permohonan keterbukaan informasi.
                    </p>
                    <a href="#" class="inline-flex items-center font-semibold text-green-600 hover:text-green-700 transition">
                        Akses PPID
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
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
                &copy; 2026 Biro Umum Kantor Gubernur Provinsi Bengkulu. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
