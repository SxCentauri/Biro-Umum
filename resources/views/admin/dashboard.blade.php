<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Dashboard Overview') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Pantau kinerja dan laporan masuk terkini.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="text-sm font-medium text-gray-600">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition.duration.300ms class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700">&times;</button>
                </div>
            @endif

            <div class="relative bg-gradient-to-r from-blue-700 to-blue-900 rounded-2xl shadow-xl overflow-hidden">
                <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white opacity-5 rounded-full blur-3xl"></div>

                <div class="relative p-8 md:p-10 flex flex-col md:flex-row items-center justify-between gap-6 text-white">
                    <div>
                        <h3 class="text-3xl font-bold mb-2">Halo, {{ Auth::user()->name }}! 👋</h3>
                        <p class="text-blue-100 text-lg max-w-2xl leading-relaxed">
                            Selamat datang di Panel Admin. <br>
                            Anda memiliki <strong class="text-yellow-300 font-bold bg-yellow-500/20 px-2 py-0.5 rounded">{{ $pendingTickets }} laporan baru</strong> yang perlu segera ditinjau hari ini.
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center border border-white/20 shadow-inner">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Laporan</p>
                            <h4 class="text-3xl font-extrabold text-gray-800 mt-2">{{ $totalTickets }}</h4>
                        </div>
                        <div class="p-3 bg-blue-50 text-blue-600 rounded-lg group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-gray-400">
                        <span>Semua tiket masuk</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group relative overflow-hidden">
                    <div class="absolute right-0 top-0 h-full w-1 bg-red-500"></div>
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Menunggu</p>
                            <h4 class="text-3xl font-extrabold text-red-600 mt-2">{{ $pendingTickets }}</h4>
                        </div>
                        <div class="p-3 bg-red-50 text-red-600 rounded-lg group-hover:bg-red-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-red-500 font-medium bg-red-50 inline-block px-2 py-1 rounded">
                        <span>Perlu tindakan segera</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Proses</p>
                            <h4 class="text-3xl font-extrabold text-yellow-600 mt-2">{{ $processTickets }}</h4>
                        </div>
                        <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg group-hover:bg-yellow-500 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-yellow-600 font-medium">
                        <span>Sedang ditangani</span>
                    </div>
                </div>

                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 group">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Selesai</p>
                            <h4 class="text-3xl font-extrabold text-green-600 mt-2">{{ $doneTickets }}</h4>
                        </div>
                        <div class="p-3 bg-green-50 text-green-600 rounded-lg group-hover:bg-green-600 group-hover:text-white transition-colors duration-300 shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-green-600 font-medium">
                        <span>Terselesaikan</span>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-200 flex flex-col md:flex-row justify-between md:items-center gap-4 bg-gray-50/50">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                            <span class="w-1.5 h-6 bg-blue-600 rounded-full"></span>
                            Tiket Masuk Terbaru
                        </h3>
                        <p class="text-xs text-gray-500 mt-1 pl-4">Menampilkan daftar kerusakan yang baru dilaporkan.</p>
                    </div>
                    <a href="{{ route('admin.report.index') }}" class="group inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition bg-white border border-gray-200 px-4 py-2 rounded-lg hover:shadow-sm">
                        Lihat Semua Rekap
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Waktu & Lokasi</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Pelapor</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Masalah</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Status</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentTickets as $ticket)
                            <tr class="hover:bg-blue-50/30 transition duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-bold text-gray-800">{{ $ticket->created_at->format('d M Y') }}</span>
                                        <span class="text-xs text-gray-500">{{ $ticket->created_at->format('H:i') }} WIB</span>
                                        <div class="flex items-center mt-1 text-xs text-gray-500">
                                            <svg class="w-3 h-3 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            {{ Str::limit($ticket->lokasi_ruangan, 20) }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-9 w-9 rounded-full bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center font-bold text-xs shadow-md mr-3 border border-white">
                                            {{ substr($ticket->user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-gray-900">{{ $ticket->user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $ticket->user->unit_kerja ?? 'Unit -' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-800 font-medium line-clamp-2 max-w-xs" title="{{ $ticket->judul_laporan }}">
                                        {{ $ticket->judul_laporan }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @php
                                        $statusClass = match($ticket->status) {
                                            'pending' => 'bg-red-50 text-red-700 border-red-200 ring-1 ring-red-100',
                                            'process' => 'bg-yellow-50 text-yellow-700 border-yellow-200 ring-1 ring-yellow-100',
                                            'done' => 'bg-green-50 text-green-700 border-green-200 ring-1 ring-green-100',
                                            default => 'bg-gray-100 text-gray-700'
                                        };
                                        $dotClass = match($ticket->status) {
                                            'pending' => 'bg-red-500',
                                            'process' => 'bg-yellow-500',
                                            'done' => 'bg-green-500',
                                            default => 'bg-gray-500'
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold border {{ $statusClass }}">
                                        <span class="w-2 h-2 mr-2 rounded-full {{ $dotClass }} {{ $ticket->status == 'pending' ? 'animate-pulse' : '' }}"></span>
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.ticket.show', $ticket->id) }}"
                                       class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-xs font-semibold text-gray-700 uppercase tracking-widest shadow-sm hover:bg-blue-50 hover:border-blue-300 hover:text-blue-700 focus:outline-none transition ease-in-out duration-150">
                                        Tindak Lanjut
                                        <svg class="ml-2 -mr-0.5 h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="p-4 bg-gray-50 rounded-full mb-3">
                                            <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        </div>
                                        <p class="text-base font-medium text-gray-900">Belum ada tiket baru</p>
                                        <p class="text-sm mt-1">Laporan kerusakan yang masuk akan muncul di sini.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
