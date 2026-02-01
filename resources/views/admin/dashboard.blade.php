<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Dashboard Admin') }}
            </h2>
            <div class="text-sm text-gray-500 mt-2 md:mt-0">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex justify-between items-center">
                    <div class="flex items-center">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-700 hover:text-green-900 font-bold">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl p-8 border-l-8 border-blue-600">
                <h3 class="text-2xl font-bold text-gray-800">Halo, {{ Auth::user()->name }}! 👋</h3>
                <p class="text-gray-600 mt-2">
                    Selamat datang kembali di Panel Admin Biro Umum. <br>
                    Saat ini ada <strong class="text-red-600">{{ $pendingTickets }} laporan baru</strong> yang menunggu tinjauan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-white rounded-xl shadow-sm p-6 flex items-center border border-gray-100 hover:shadow-md transition">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Total Laporan</div>
                        <div class="text-3xl font-extrabold text-gray-800">{{ $totalTickets }}</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 flex items-center border border-gray-100 hover:shadow-md transition">
                    <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Perlu Tindakan</div>
                        <div class="text-3xl font-extrabold text-red-600">{{ $pendingTickets }}</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 flex items-center border border-gray-100 hover:shadow-md transition">
                    <div class="p-3 rounded-full bg-yellow-100 text-yellow-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Sedang Dikerjakan</div>
                        <div class="text-3xl font-extrabold text-yellow-600">{{ $processTickets }}</div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 flex items-center border border-gray-100 hover:shadow-md transition">
                    <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <div class="text-gray-500 text-sm font-medium uppercase tracking-wider">Selesai</div>
                        <div class="text-3xl font-extrabold text-green-600">{{ $doneTickets }}</div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-lg font-bold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                        Tiket Masuk Terbaru
                    </h3>
                    <a href="{{ route('admin.report.index') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium hover:underline">
                        Lihat Semua Rekap &rarr;
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white text-gray-500 border-b border-gray-200 text-xs uppercase tracking-wider">
                                <th class="p-4 font-semibold">Waktu Lapor</th>
                                <th class="p-4 font-semibold">Pelapor & Unit</th>
                                <th class="p-4 font-semibold">Masalah</th>
                                <th class="p-4 font-semibold text-center">Status</th>
                                <th class="p-4 font-semibold text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($recentTickets as $ticket)
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                <td class="p-4 text-sm text-gray-600">
                                    <div class="font-bold text-gray-800">{{ $ticket->created_at->format('d M Y') }}</div>
                                    <div class="text-xs">{{ $ticket->created_at->format('H:i') }} WIB</div>
                                </td>
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs mr-3">
                                            {{ substr($ticket->user->name, 0, 2) }}
                                        </div>
                                        <div>
                                            <div class="text-sm font-bold text-gray-800">{{ $ticket->user->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $ticket->user->unit_kerja ?? 'Unit Tidak Diketahui' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <div class="text-sm text-gray-800 font-medium">{{ Str::limit($ticket->judul_laporan, 40) }}</div>
                                    <div class="text-xs text-gray-500 mt-1 flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        {{ $ticket->lokasi_ruangan }}
                                    </div>
                                </td>
                                <td class="p-4 text-center">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border
                                        {{ $ticket->status == 'pending' ? 'bg-red-50 text-red-700 border-red-200' : '' }}
                                        {{ $ticket->status == 'process' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}
                                        {{ $ticket->status == 'done' ? 'bg-green-50 text-green-700 border-green-200' : '' }}">

                                        <span class="w-2 h-2 mr-1.5 rounded-full
                                            {{ $ticket->status == 'pending' ? 'bg-red-500' : '' }}
                                            {{ $ticket->status == 'process' ? 'bg-yellow-500' : '' }}
                                            {{ $ticket->status == 'done' ? 'bg-green-500' : '' }}">
                                        </span>
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td class="p-4 text-center">
                                    <a href="{{ route('admin.ticket.show', $ticket->id) }}"
                                       class="group inline-flex items-center px-3 py-1.5 bg-white border border-blue-600 rounded-md text-xs font-semibold text-blue-600 uppercase tracking-widest hover:bg-blue-600 hover:text-white transition ease-in-out duration-150 shadow-sm">
                                        Tindak Lanjut
                                        <svg class="w-3 h-3 ml-1 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center flex flex-col items-center justify-center text-gray-500">
                                    <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span class="text-sm">Belum ada laporan masuk hari ini.</span>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 text-xs text-gray-500 flex justify-between">
                    <span>Menampilkan {{ $recentTickets->count() }} tiket terbaru.</span>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
