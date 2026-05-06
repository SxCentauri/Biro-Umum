<nav x-data="{ openMobile: false }" class="bg-white border-b border-gray-100 shadow-md sticky top-0 z-50 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <div class="flex items-center">
                <a href="{{ route('web.home') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo Biro Umum" class="h-10 md:h-12 w-auto transition transform group-hover:scale-105">
                    <div class="flex flex-col">
                        <span class="font-extrabold text-gray-800 text-base md:text-lg leading-none tracking-tight">BIRO UMUM</span>
                        <span class="text-[10px] md:text-xs text-gray-500 font-medium tracking-wide">SEKRETARIAT DAERAH BENGKULU</span>
                    </div>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-1">
                <a href="{{ route('web.home') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 rounded-md hover:bg-blue-50 transition">HOME</a>
                <a href="{{ route('web.profil') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 rounded-md hover:bg-blue-50 transition">PROFIL BIRO</a>

                <a href="{{ route('web.agenda') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md transition">AGENDA</a>
                <a href="{{ route('web.kontak') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md transition">KONTAK</a>

                <div class="pl-4 border-l border-gray-200 ml-2">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-full text-sm hover:bg-blue-700 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        Login Pegawai
                    </a>
                </div>
            </div>

            <div class="flex items-center md:hidden">
                <button @click="openMobile = !openMobile" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-blue-600 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 transition">
                    <span class="sr-only">Buka menu utama</span>
                    <svg x-show="!openMobile" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg x-show="openMobile" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div x-show="openMobile" x-cloak
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden absolute top-20 left-0 w-full bg-white border-b border-gray-200 shadow-xl overflow-y-auto max-h-[calc(100vh-5rem)]">

        <div class="px-4 pt-2 pb-6 space-y-1">
            <a href="{{ route('web.home') }}" class="block px-3 py-3 rounded-md text-base font-medium text-gray-800 hover:text-blue-600 hover:bg-blue-50 transition">HOME</a>
            <a href="{{ route('web.profil') }}" class="block px-3 py-3 rounded-md text-base font-medium text-gray-800 hover:text-blue-600 hover:bg-blue-50 transition">PROFIL BIRO</a>

            <a href="{{ route('web.agenda') }}" class="block px-3 py-3 rounded-md text-base font-medium text-gray-800 hover:text-blue-600 hover:bg-blue-50 transition">AGENDA</a>
            <a href="{{ route('web.kontak') }}" class="block px-3 py-3 rounded-md text-base font-medium text-gray-800 hover:text-blue-600 hover:bg-blue-50 transition">KONTAK</a>

            <div class="mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-4 py-3 bg-blue-600 text-white font-medium rounded-lg text-base hover:bg-blue-700 shadow-md transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                    Login Pegawai
                </a>
            </div>
        </div>
    </div>
</nav>
