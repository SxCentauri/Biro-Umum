<nav x-data="{ open: false }" class="bg-white/90 backdrop-blur-md border-b border-gray-200 shadow-sm sticky top-0 z-50 border-t-4 border-blue-600">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('web.home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-blue-600 transition transform hover:scale-105" />
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    @if(Auth::user()->role == 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" class="group flex items-center gap-2 font-medium transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')" class="group flex items-center gap-2 font-medium transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.posts.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            {{ __('Berita (CMS)') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.profil.index')" :active="request()->routeIs('admin.profil.*') || request()->routeIs('admin.pejabat.*')" class="group flex items-center gap-2 font-medium transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.profil.*') || request()->routeIs('admin.pejabat.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            {{ __('Profil & Organisasi') }}
                        </x-nav-link>

                        <x-nav-link :href="route('admin.report.index')" :active="request()->routeIs('admin.report.*')" class="group flex items-center gap-2 font-medium transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 {{ request()->routeIs('admin.report.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                            {{ __('Rekap Laporan') }}
                        </x-nav-link>

                    @else
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="group flex items-center gap-2 font-medium transition duration-150 ease-in-out">
                            <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-blue-600' }} transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            {{ __('Riwayat Tiket') }}
                        </x-nav-link>

                        <x-nav-link :href="route('ticket.create')" :active="request()->routeIs('ticket.create')" class="group flex items-center gap-2 font-bold transition duration-150 ease-in-out {{ request()->routeIs('ticket.create') ? 'text-blue-700' : 'text-blue-600 hover:text-blue-800' }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('ticket.create') ? 'text-blue-700' : 'text-blue-600 group-hover:text-blue-800' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                            {{ __('Buat Tiket') }}
                        </x-nav-link>
                    @endif

                    <x-nav-link :href="route('web.home')" :active="false" target="_blank" class="flex items-center gap-1 text-gray-500 hover:text-gray-800 transition">
                        {{ __('Web Utama') }}
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </x-nav-link>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150 shadow-sm border-gray-200">
                            <div class="text-right mr-3">
                                <div class="font-bold text-gray-800">{{ Auth::user()->name }}</div>
                                <span class="text-[10px] text-white px-2 py-0.5 rounded-full uppercase tracking-wider font-bold
                                    {{ Auth::user()->role == 'admin' ? 'bg-blue-600' : 'bg-gray-500' }}">
                                    {{ Auth::user()->role }}
                                </span>
                            </div>

                            <div class="bg-gray-100 p-2 rounded-full">
                                <svg class="fill-current h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-white text-gray-700">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2 hover:bg-gray-100 text-gray-700">
                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                {{ __('Profile Saya') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="flex items-center gap-2 text-red-600 hover:bg-red-50 hover:text-red-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-gray-100 bg-white">
        <div class="pt-2 pb-3 space-y-1">

            @if(Auth::user()->role == 'admin')
                <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                    {{ __('Dashboard Admin') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                    {{ __('Kelola Berita') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.profil.index')" :active="request()->routeIs('admin.profil.*') || request()->routeIs('admin.pejabat.*')">
                    {{ __('Profil & Organisasi') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('admin.report.index')" :active="request()->routeIs('admin.report.*')">
                    {{ __('Rekap Laporan') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Riwayat Tiket') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('ticket.create')" :active="request()->routeIs('ticket.create')">
                    {{ __('Buat Tiket Baru') }}
                </x-responsive-nav-link>
            @endif

            <x-responsive-nav-link :href="route('web.home')" target="_blank">
                {{ __('Halaman Depan Website') }}
            </x-responsive-nav-link>

        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 bg-gray-50">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-red-600 font-bold">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
