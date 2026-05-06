<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        <title>Biro Umum - Sekretariat Daerah</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <style>
            [x-cloak] { display: none !important; }
            body { font-family: 'Inter', sans-serif; }

            /* Custom Scrollbar agar lebih rapi */
            ::-webkit-scrollbar { width: 8px; }
            ::-webkit-scrollbar-track { background: #f1f1f1; }
            ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
            ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900" x-data="{ loaded: false }" x-init="loaded = true">

        <div x-show="!loaded" x-transition.opacity.duration.300ms class="fixed inset-0 z-[60] bg-white flex items-center justify-center">
            <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-blue-600"></div>
        </div>

        <div class="min-h-screen flex flex-col transition-opacity duration-500" x-show="loaded" x-cloak>

            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white/80 backdrop-blur-md shadow-sm border-b border-gray-100 sticky top-16 z-30 transition-all duration-300">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main class="flex-grow relative">
                <div class="fixed inset-0 z-[-1] opacity-[0.03] pointer-events-none"
                     style="background-image: radial-gradient(#2563eb 1px, transparent 1px); background-size: 24px 24px;">
                </div>

                {{ $slot }}
            </main>

            <footer class="bg-white border-t border-gray-200 mt-12 relative">
                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-blue-600 via-yellow-400 to-blue-600"></div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                    <div class="flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">

                        <div class="flex items-center gap-2 mb-2 md:mb-0">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Lambang_Provinsi_Bengkulu.png"
                                 alt="Logo" class="h-6 w-auto grayscale opacity-50 hover:grayscale-0 hover:opacity-100 transition duration-300">
                            <span>&copy; {{ date('Y') }} Biro Umum Sekretariat Daerah Provinsi Bengkulu.</span>
                        </div>

                        <div class="flex space-x-6">
                            <span class="text-xs text-gray-400">Sistem Informasi Manajemen Pelayanan</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
