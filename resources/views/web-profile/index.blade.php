<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Biro Umum - Sekretariat Daerah Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1500)">

    <div x-show="loading"
         x-transition:leave="transition ease-in duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-white">
        <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-b-4 border-blue-600 mb-4"></div>
        <div class="text-blue-900 font-bold text-lg animate-pulse">Memuat Biro Umum...</div>
    </div>

    <div x-show="!loading" x-transition:enter="transition ease-out duration-700" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">

        @include('web-profile.layouts.navbar')

        <div class="relative bg-blue-900 h-[500px] flex items-center">
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1920&auto=format&fit=crop"
                 alt="Kantor Gubernur" class="absolute inset-0 w-full h-full object-cover opacity-40">

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                <div class="max-w-3xl">
                    <span class="bg-yellow-500 text-blue-900 text-xs font-bold px-3 py-1 rounded-full mb-4 inline-block shadow-lg">
                        SEKRETARIAT DAERAH PROVINSI BENGKULU
                    </span>
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight mb-4 drop-shadow-md">
                        Melayani dengan <br> <span class="text-yellow-400">Integritas & Profesional</span>
                    </h1>
                    <p class="text-lg text-gray-200 mb-8 leading-relaxed max-w-2xl">
                        Selamat datang di Website Resmi Biro Umum. Pusat informasi layanan administrasi, keprotokolan, dan rumah tangga pimpinan daerah.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="{{ route('web.agenda') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition transform hover:-translate-y-1">
                            Agenda & Berita
                        </a>
                        <a href="{{ route('web.profil') }}" class="bg-white hover:bg-gray-100 text-blue-900 font-bold py-3 px-8 rounded-lg shadow-lg transition">
                            Profil Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative -mt-16 z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-blue-500 hover:shadow-2xl transition">
                    <div class="flex items-center mb-4">
                        <div class="bg-blue-100 p-3 rounded-full text-blue-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Fasilitas & Aset</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Pengelolaan aset dan fasilitas gedung daerah yang optimal dan terawat.</p>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-yellow-500 hover:shadow-2xl transition">
                    <div class="flex items-center mb-4">
                        <div class="bg-yellow-100 p-3 rounded-full text-yellow-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Pelayanan Tamu</h3>
                    </div>
                    <p class="text-gray-600 text-sm">SOP Keprotokolan dan pelayanan tamu pimpinan secara profesional.</p>
                </div>
                <div class="bg-white rounded-xl shadow-xl p-6 border-l-4 border-green-500 hover:shadow-2xl transition">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 p-3 rounded-full text-green-600 mr-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800">Dokumen Digital</h3>
                    </div>
                    <p class="text-gray-600 text-sm">Akses cepat ke dokumen Renstra, LAKIP, dan Produk Hukum Biro.</p>
                </div>
            </div>
        </div>

        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Berita & Kegiatan Terbaru</h2>
                    <div class="w-24 h-1 bg-blue-500 mx-auto mt-4 rounded"></div>
                    <p class="mt-4 text-gray-600">Informasi terkini seputar kegiatan Biro Umum dan Pemerintah Provinsi Bengkulu.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($posts as $post)
                        <article class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 flex flex-col h-full">

                            <div class="relative h-48 bg-gray-200">
                                @if($post->gambar)
                                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-60">
                                @endif

                                <span class="absolute top-4 right-4 text-xs font-bold px-3 py-1 rounded shadow text-white
                                    {{ $post->kategori == 'kegiatan' ? 'bg-blue-600' : '' }}
                                    {{ $post->kategori == 'pengumuman' ? 'bg-yellow-500' : '' }}
                                    {{ $post->kategori == 'berita' ? 'bg-green-600' : '' }}">
                                    {{ strtoupper($post->kategori) }}
                                </span>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-gray-500 text-sm mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition line-clamp-2">
                                    {{ $post->judul }}
                                </h3>

                                <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                                    {{ Str::limit(strip_tags($post->isi), 100) }}
                                </p>

                                <a href="#" class="inline-block text-blue-600 font-semibold hover:underline mt-auto">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-1 md:col-span-3 text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            <h3 class="text-lg font-medium text-gray-900">Belum ada berita terbaru</h3>
                            <p class="text-gray-500">Silakan login sebagai admin untuk memposting berita atau kegiatan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <footer class="bg-gray-900 text-white border-t-4 border-yellow-500">
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
                    &copy; 2026 Biro Umum Kantor Gubernur Provinsi Bengkulu. All rights reserved.
                </div>
            </div>
        </footer>

    </div>
</body>
</html>
