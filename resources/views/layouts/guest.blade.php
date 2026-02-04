<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Biro Umum') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            [x-cloak] { display: none !important; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased overflow-hidden bg-gray-50" x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)">

        <div class="min-h-screen flex">

            <div x-cloak x-show="show"
                 x-transition:enter="transition ease-out duration-1000"
                 x-transition:enter-start="opacity-0 -translate-x-20"
                 x-transition:enter-end="opacity-100 translate-x-0"
                 class="hidden lg:flex w-1/2 bg-blue-900 items-center justify-center relative overflow-hidden shadow-2xl z-10">

                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=1920&auto=format&fit=crop"
                     class="absolute inset-0 w-full h-full object-cover opacity-40 transform scale-105 hover:scale-110 transition duration-[20s] ease-linear">

                <div class="relative z-10 text-white text-center px-12">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Lambang_Provinsi_Bengkulu.png"
                         alt="Logo" class="w-32 h-auto mx-auto mb-8 drop-shadow-2xl animate-[bounce_3s_infinite]">

                    <h2 class="text-5xl font-extrabold mb-3 tracking-tight">Sistem Informasi</h2>
                    <h3 class="text-3xl font-light mb-6">Biro Umum Sekretariat Daerah</h3>
                    <p class="text-blue-100 text-lg tracking-widest uppercase border-t border-blue-400 pt-4 inline-block">
                        Provinsi Bengkulu
                    </p>
                </div>

                <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
                <div class="absolute -top-20 -right-20 w-80 h-80 bg-yellow-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            </div>

            <div x-cloak x-show="show"
                 x-transition:enter="transition ease-out duration-1000 delay-300"
                 x-transition:enter-start="opacity-0 translate-y-10"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-gray-50 px-6 py-12 relative">

                <div class="lg:hidden mb-8 text-center animate-pulse">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Lambang_Provinsi_Bengkulu.png" class="w-20 h-auto mx-auto mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Biro Umum</h2>
                </div>

                <div class="w-full sm:max-w-md mt-6 px-8 py-10 bg-white shadow-xl rounded-3xl border-t-4 border-blue-600 transform hover:-translate-y-1 transition duration-500">

                    {{ $slot }}

                </div>

                <div class="mt-8 text-center text-sm text-gray-400">
                    &copy; 2026 Biro Umum Prov. Bengkulu
                </div>
            </div>

        </div>
    </body>
</html>
