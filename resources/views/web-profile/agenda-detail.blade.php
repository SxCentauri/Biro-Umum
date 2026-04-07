<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->judul }} - Biro Umum Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }

        /* Styling yang Diperkaya untuk Konten WYSIWYG */
        .article-content { color: #374151; }
        .article-content p { margin-bottom: 1.5rem; line-height: 1.8; }
        .article-content h2 { font-size: 1.875rem; font-weight: 700; color: #111827; margin-top: 2.5rem; margin-bottom: 1rem; }
        .article-content h3 { font-size: 1.5rem; font-weight: 600; color: #1f2937; margin-top: 2rem; margin-bottom: 0.75rem; }
        .article-content ul { list-style-type: disc; margin-left: 1.5rem; margin-bottom: 1.5rem; }
        .article-content ol { list-style-type: decimal; margin-left: 1.5rem; margin-bottom: 1.5rem; }
        .article-content li { margin-bottom: 0.5rem; }
        .article-content a { color: #2563eb; text-decoration: underline; text-underline-offset: 4px; transition: color 0.2s; font-weight: 500; }
        .article-content a:hover { color: #1d4ed8; }
        .article-content blockquote { border-left: 4px solid #cbd5e1; padding-left: 1.25rem; font-style: italic; color: #475569; margin: 2rem 0; background-color: #f8fafc; padding-top: 1rem; padding-bottom: 1rem; border-radius: 0 0.5rem 0.5rem 0; }
        .article-content img { border-radius: 0.75rem; margin-top: 2rem; margin-bottom: 2rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); width: 100%; height: auto; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    @include('web-profile.layouts.navbar')

    <section class="py-10 md:py-16 bg-white flex-grow">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav class="flex text-sm text-gray-500 mb-10 overflow-x-auto whitespace-nowrap pb-2">
                <ol class="flex items-center space-x-2">
                    <li><a href="{{ route('web.home') }}" class="hover:text-blue-600 transition font-medium">Beranda</a></li>
                    <li><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
                    <li><a href="{{ route('web.agenda') }}" class="hover:text-blue-600 transition font-medium">Agenda & Berita</a></li>
                    <li><svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg></li>
                    <li class="text-gray-900 font-semibold truncate max-w-[200px] sm:max-w-xs">{{ $post->judul }}</li>
                </ol>
            </nav>

            <div class="mb-10">
                <div class="flex flex-wrap items-center gap-3 mb-5 text-sm">
                    @php
                        $badgeColor = match(strtolower($post->kategori)) {
                            'pengumuman' => 'bg-yellow-100 text-yellow-800 ring-yellow-600/20',
                            'kegiatan'   => 'bg-blue-100 text-blue-800 ring-blue-600/20',
                            'berita'     => 'bg-green-100 text-green-800 ring-green-600/20',
                            default      => 'bg-gray-100 text-gray-800 ring-gray-500/20'
                        };
                    @endphp
                    <span class="{{ $badgeColor }} ring-1 inset-0 px-3 py-1 rounded-full font-bold uppercase tracking-wider text-[10px] md:text-xs">
                        {{ $post->kategori }}
                    </span>

                    <div class="flex items-center text-gray-500 gap-3 border-l border-gray-300 pl-3">
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            {{ $post->created_at->translatedFormat('l, d F Y') }}
                        </span>
                        <span class="hidden sm:flex items-center">
                            <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            Biro Umum
                        </span>
                    </div>
                </div>

                <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight md:leading-tight mb-6">
                    {{ $post->judul }}
                </h1>
            </div>

            @if($post->gambar)
                <div class="rounded-2xl overflow-hidden mb-10 shadow-md border border-gray-100 bg-gray-50 group">
                    <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-auto max-h-[500px] object-cover transition duration-500 group-hover:scale-105">
                </div>
            @endif

            <div class="article-content text-base md:text-lg">
                {!! $post->isi !!}
            </div>

            <div class="mt-12 pt-8 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-6">

                    <a href="{{ route('web.agenda') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-gray-50 hover:bg-gray-100 border border-gray-200 text-gray-700 font-semibold rounded-xl transition duration-200 group">
                        <svg class="w-5 h-5 mr-2 text-gray-500 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                        Kembali ke Daftar
                    </a>

                    <div class="flex items-center gap-3">
                        <span class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Bagikan:</span>
                        <a href="https://api.whatsapp.com/send?text={{ urlencode($post->judul . ' - ' . Request::url()) }}" target="_blank" class="p-2.5 bg-green-50 text-green-600 hover:bg-green-100 hover:text-green-700 rounded-full transition" aria-label="Share ke WhatsApp">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <footer class="bg-gray-900 text-white border-t-4 border-yellow-500 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 md:py-12">
            <div class="text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} Biro Umum Kantor Gubernur Provinsi Bengkulu.
            </div>
        </div>
    </footer>

</body>
</html>
