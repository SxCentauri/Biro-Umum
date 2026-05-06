<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Agenda & Berita - Biro Umum Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 500)">

    <div x-show="loading" class="fixed inset-0 z- flex flex-col items-center justify-center bg-white">
        <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-b-4 border-blue-600 mb-4"></div>
        <div class="text-blue-900 font-bold text-sm animate-pulse">Memuat Berita...</div>
    </div>

    <div x-show="!loading" x-transition.opacity.duration.500ms class="flex flex-col min-h-screen">

        @include('web-profile.layouts.navbar')

        <div class="bg-blue-900 py-10 md:py-16 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">Agenda & Berita Terkini</h1>
                <p class="text-blue-200 text-sm md:text-base max-w-2xl mx-auto mb-4">Informasi publik dan agenda kegiatan terbaru di lingkungan Biro Umum Setda Provinsi Bengkulu.</p>
                <nav class="flex justify-center text-sm text-blue-300">
                    <ol class="flex items-center space-x-2">
                        <li><a href="{{ route('web.home') }}" class="hover:text-white transition">Beranda</a></li>
                        <li><span class="mx-1">/</span></li>
                        <li class="text-white font-semibold">Agenda</li>
                    </ol>
                </nav>
            </div>
        </div>

        <section class="py-12 md:py-16 bg-gray-50 flex-grow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="flex flex-col md:flex-row justify-between items-center mb-10 gap-4">
                    <h2 class="text-2xl font-bold text-gray-800 border-l-4 border-blue-600 pl-3">Publikasi Terbaru</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                    @forelse($posts as $post)
                        <article class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 overflow-hidden flex flex-col group transform hover:-translate-y-1 h-full">

                            <div class="relative h-56 bg-gray-200 overflow-hidden">
                                @if($post->gambar)
                                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-700">
                                @else
                                    <img src="https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition duration-700">
                                @endif

                                <span class="absolute top-4 left-4 text-[10px] tracking-wider font-bold px-3 py-1.5 rounded-md shadow text-white uppercase
                                    {{ strtolower($post->kategori) == 'kegiatan' ? 'bg-blue-600' : '' }}
                                    {{ strtolower($post->kategori) == 'pengumuman' ? 'bg-yellow-500' : '' }}
                                    {{ strtolower($post->kategori) == 'berita' ? 'bg-green-600' : '' }}
                                    {{ !in_array(strtolower($post->kategori), ['kegiatan', 'pengumuman', 'berita']) ? 'bg-gray-600' : '' }}">
                                    {{ strtoupper($post->kategori) }}
                                </span>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="text-gray-500 text-xs mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                    {{ $post->created_at->format('d M Y') }}
                                </div>

                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition leading-snug line-clamp-2">
                                    <a href="{{ route('web.agenda.show', $post->id) }}">{{ $post->judul }}</a>
                                </h3>

                                <p class="text-gray-600 text-sm line-clamp-3 mb-6 flex-grow">
                                    {{ Str::limit(strip_tags($post->isi), 100) }}
                                </p>

                                <div class="mt-auto border-t border-gray-100 pt-4">
                                    <a href="{{ route('web.agenda.show', $post->id) }}" class="inline-flex items-center text-blue-600 font-semibold text-sm hover:text-blue-800 transition">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="col-span-1 md:col-span-3 text-center py-16 bg-white rounded-2xl border-2 border-dashed border-gray-300">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            <h3 class="text-lg font-medium text-gray-900">Belum ada berita terbaru</h3>
                            <p class="text-gray-500 mt-1">Silakan login sebagai admin untuk memposting berita atau kegiatan.</p>
                        </div>
                    @endforelse

                </div>

                @if($posts->hasPages())
                    <div class="mt-12 flex justify-center">
                        {{ $posts->links() }}
                    </div>
                @endif

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
