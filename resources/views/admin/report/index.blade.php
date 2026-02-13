<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight flex items-center">
            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
            {{ __('Rekapitulasi Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100"
                 x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0">

                <div class="p-8 text-gray-900">

                    <div class="bg-blue-50/50 p-6 rounded-xl border border-blue-100 mb-8">
                        <form action="{{ route('admin.report.index') }}" method="GET" class="flex flex-col md:flex-row gap-6 items-end">
                            <div class="w-full md:w-auto">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Dari Tanggal</label>
                                <input type="date" name="start_date" value="{{ $startDate }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition text-sm">
                            </div>
                            <div class="w-full md:w-auto">
                                <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Sampai Tanggal</label>
                                <input type="date" name="end_date" value="{{ $endDate }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition text-sm">
                            </div>

                            <div class="flex gap-3 mt-4 md:mt-0 w-full md:w-auto">
                                <button type="submit" class="flex-1 md:flex-none bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center font-semibold text-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    Filter Data
                                </button>

                                <a href="{{ route('admin.report.print', ['start_date' => $startDate, 'end_date' => $endDate]) }}" target="_blank" class="flex-1 md:flex-none bg-gray-800 text-white px-5 py-2.5 rounded-lg hover:bg-gray-900 shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center font-semibold text-sm ml-auto">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                                    Cetak PDF
                                </a>
                            </div>
                        </form>
                    </div>

                    <div class="overflow-x-auto rounded-xl border border-gray-200">
                        <table class="min-w-full text-sm text-left">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="p-4 font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="p-4 font-bold text-gray-500 uppercase tracking-wider">Pelapor</th>
                                    <th class="p-4 font-bold text-gray-500 uppercase tracking-wider">Masalah</th>
                                    <th class="p-4 font-bold text-gray-500 uppercase tracking-wider text-center">Status</th>
                                    <th class="p-4 font-bold text-gray-500 uppercase tracking-wider">Catatan Teknisi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($tickets as $ticket)
                                <tr class="hover:bg-blue-50/30 transition duration-150">
                                    <td class="p-4 align-middle whitespace-nowrap">
                                        <span class="font-medium text-gray-700">{{ $ticket->created_at->format('d/m/Y') }}</span>
                                        <div class="text-xs text-gray-400">{{ $ticket->created_at->format('H:i') }} WIB</div>
                                    </td>
                                    <td class="p-4 align-middle">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs mr-3 border border-blue-200">
                                                {{ substr($ticket->user->name, 0, 2) }}
                                            </div>
                                            <div>
                                                <div class="font-bold text-gray-800">{{ $ticket->user->name }}</div>
                                                <div class="text-xs text-gray-500">{{ $ticket->user->unit_kerja ?? '-' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle font-medium text-gray-700">
                                        {{ $ticket->judul_laporan }}
                                        <div class="text-xs text-gray-400 mt-1 flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            {{ $ticket->lokasi_ruangan }}
                                        </div>
                                    </td>
                                    <td class="p-4 align-middle text-center">
                                        @php
                                            $statusClass = match($ticket->status) {
                                                'done' => 'bg-green-50 text-green-700 border-green-200 ring-1 ring-green-100',
                                                'process' => 'bg-yellow-50 text-yellow-700 border-yellow-200 ring-1 ring-yellow-100',
                                                'pending' => 'bg-red-50 text-red-700 border-red-200 ring-1 ring-red-100',
                                                default => 'bg-gray-100'
                                            };
                                        @endphp
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $statusClass }}">
                                            {{ ucfirst($ticket->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 align-middle text-sm text-gray-600 italic">
                                        @if($ticket->catatan_teknisi)
                                            "{{ Str::limit($ticket->catatan_teknisi, 50) }}"
                                        @else
                                            <span class="text-gray-300">-</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <svg class="w-12 h-12 mb-3 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                            <span class="text-base font-medium text-gray-500">Tidak ada data laporan</span>
                                            <span class="text-xs">Coba sesuaikan filter tanggal di atas.</span>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 text-xs text-gray-400 text-right">
                        Menampilkan data dari <strong>{{ \Carbon\Carbon::parse($startDate)->format('d M Y') }}</strong> s/d <strong>{{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
