<nav x-data="{ openMobile: false }" class="bg-white border-b border-gray-100 shadow-md sticky top-0 z-50 font-sans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">

            <div class="flex items-center">
                <a href="{{ route('web.home') }}" class="flex items-center gap-3 group">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/Lambang_Provinsi_Bengkulu.png"
                         alt="Logo" class="h-12 w-auto transition transform group-hover:scale-105">
                    <div class="flex flex-col">
                        <span class="font-extrabold text-gray-800 text-lg leading-none tracking-tight">BIRO UMUM</span>
                        <span class="text-xs text-gray-500 font-medium tracking-wide">SEKRETARIAT DAERAH BENGKULU</span>
                    </div>
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-1">

                <a href="{{ route('web.home') }}"
                   class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 rounded-md hover:bg-blue-50 transition">
                   HOME
                </a>

                <div class="relative group h-full flex items-center" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md focus:outline-none transition" :class="{'text-blue-700 bg-blue-50': open}">
                        PROFIL BIRO
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-14 left-0 w-64 bg-white border border-gray-100 shadow-xl rounded-lg py-2 z-50">

                        <div class="absolute -top-4 left-0 w-full h-4 bg-transparent"></div>

                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Struktur Organisasi</a>
                        <a href="{{ route('web.profil') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Visi dan Misi</a>

                        <div class="relative group/sub" x-data="{ openSub: false }" @mouseenter="openSub = true" @mouseleave="openSub = false">
                            <button class="w-full text-left flex justify-between items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition" :class="{'bg-blue-50 text-blue-700': openSub}">
                                Profil Pimpinan
                                <svg class="w-4 h-4 transform -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>

                            <div x-show="openSub"
                                 class="absolute left-full top-0 w-72 bg-white border border-gray-100 shadow-xl rounded-lg py-2 -ml-1 z-50">
                                <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kepala Biro</a>

                                <div class="relative group/sub2" x-data="{ openSub2: false }" @mouseenter="openSub2 = true" @mouseleave="openSub2 = false">
                                    <button class="w-full text-left flex justify-between items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                        Kabag Adm. Keuangan
                                        <svg class="w-4 h-4 transform -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <div x-show="openSub2" class="absolute left-full top-0 w-72 bg-white border border-gray-100 shadow-xl rounded-lg py-2 -ml-1">
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag Verifikasi & Akuntansi</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag TU Keuangan</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag Perbendaharaan</a>
                                    </div>
                                </div>

                                <div class="relative group/sub2" x-data="{ openSub2: false }" @mouseenter="openSub2 = true" @mouseleave="openSub2 = false">
                                    <button class="w-full text-left flex justify-between items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                        Kabag Humas & Protokol
                                        <svg class="w-4 h-4 transform -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <div x-show="openSub2" class="absolute left-full top-0 w-72 bg-white border border-gray-100 shadow-xl rounded-lg py-2 -ml-1">
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag Protokol</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag Humas</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag TU Pimpinan</a>
                                    </div>
                                </div>

                                <div class="relative group/sub2" x-data="{ openSub2: false }" @mouseenter="openSub2 = true" @mouseleave="openSub2 = false">
                                    <button class="w-full text-left flex justify-between items-center px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">
                                        Kabag Rumah Tangga
                                        <svg class="w-4 h-4 transform -rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </button>
                                    <div x-show="openSub2" class="absolute left-full top-0 w-72 bg-white border border-gray-100 shadow-xl rounded-lg py-2 -ml-1">
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag TU Biro & Umum</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag RT Sekda</a>
                                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kasubbag RT Gub & Wagub</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('web.kontak') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kontak</a>
                    </div>
                </div>

                <div class="relative group h-full flex items-center" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md focus:outline-none transition" :class="{'text-blue-700 bg-blue-50': open}">
                        TUPOKSI
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute top-14 left-0 w-64 bg-white border border-gray-100 shadow-xl rounded-lg py-2 z-50">

                         <div class="absolute -top-4 left-0 w-full h-4 bg-transparent"></div>

                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Sekretaris Daerah</a>
                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Asisten Admin. Umum</a>
                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Kepala Biro Umum</a>
                    </div>
                </div>

                <div class="relative group h-full flex items-center" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md focus:outline-none transition" :class="{'text-blue-700 bg-blue-50': open}">
                        PELAYANAN
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute top-14 left-0 w-64 bg-white border border-gray-100 shadow-xl rounded-lg py-2 z-50">

                         <div class="absolute -top-4 left-0 w-full h-4 bg-transparent"></div>

                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">SOP Mengundang Gubernur</a>
                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Produk Hukum</a>
                        <a href="{{ route('web.layanan') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Layanan Pengaduan</a>
                    </div>
                </div>

                <div class="relative group h-full flex items-center" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="flex items-center px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md focus:outline-none transition" :class="{'text-blue-700 bg-blue-50': open}">
                        DOKUMEN
                        <svg class="ml-1 w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         class="absolute top-14 left-0 w-64 bg-white border border-gray-100 shadow-xl rounded-lg py-2 z-50">

                         <div class="absolute -top-4 left-0 w-full h-4 bg-transparent"></div>

                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Galeri Foto</a>
                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">Panduan Keprotokolan</a>
                        <a href="#" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition">RENSTRA</a>
                    </div>
                </div>

                <a href="#" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md transition">AGENDA</a>
                <a href="#" class="px-4 py-2 text-sm font-semibold text-gray-700 hover:text-blue-700 hover:bg-blue-50 rounded-md transition">PPID</a>

                <div class="pl-4 border-l border-gray-200 ml-2">
                    <a href="{{ route('login') }}" class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-full text-sm hover:bg-blue-700 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                        Login Pegawai
                    </a>
                </div>

            </div>
        </div>
    </div>
</nav>
