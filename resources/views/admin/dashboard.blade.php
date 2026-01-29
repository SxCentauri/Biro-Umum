<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm">Total Tiket</div>
                    <div class="text-3xl font-bold text-gray-800">{{ $totalTickets }}</div>
                </div>
                <div class="bg-red-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="text-red-600 text-sm font-bold">Perlu Tindakan (Pending)</div>
                    <div class="text-3xl font-bold text-red-700">{{ $pendingTickets }}</div>
                </div>
                <div class="bg-yellow-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="text-yellow-600 text-sm font-bold">Sedang Dikerjakan</div>
                    <div class="text-3xl font-bold text-yellow-700">{{ $processTickets }}</div>
                </div>
                <div class="bg-green-50 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-green-600 text-sm font-bold">Selesai</div>
                    <div class="text-3xl font-bold text-green-700">{{ $doneTickets }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-bold">Tiket Laporan Terbaru</h3>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="border-b bg-gray-50">
                                    <th class="p-3 text-sm font-semibold text-gray-600">Tanggal</th>
                                    <th class="p-3 text-sm font-semibold text-gray-600">Pelapor</th>
                                    <th class="p-3 text-sm font-semibold text-gray-600">Masalah</th>
                                    <th class="p-3 text-sm font-semibold text-gray-600">Status</th>
                                    <th class="p-3 text-sm font-semibold text-gray-600">Aksi</th> </tr>
                            </thead>
                            <tbody>
                                @forelse($recentTickets as $ticket)
                                <tr class="border-b hover:bg-gray-50 transition">
                                    <td class="p-3 text-sm">{{ $ticket->created_at->format('d M Y') }}</td>
                                    <td class="p-3 text-sm">
                                        <div class="font-medium text-gray-900">{{ $ticket->user->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $ticket->user->unit_kerja ?? 'Staf' }}</div>
                                    </td>
                                    <td class="p-3 text-sm text-gray-700">{{ Str::limit($ticket->judul_laporan, 40) }}</td>
                                    <td class="p-3">
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full
                                            {{ $ticket->status == 'pending' ? 'bg-red-100 text-red-800' : '' }}
                                            {{ $ticket->status == 'process' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                            {{ $ticket->status == 'done' ? 'bg-green-100 text-green-800' : '' }}">
                                            {{ ucfirst($ticket->status) }}
                                        </span>
                                    </td>
                                    <td class="p-3">
                                        <a href="{{ route('admin.ticket.show', $ticket->id) }}"
                                           class="inline-flex items-center px-3 py-1 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                            Tindak Lanjut
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="p-6 text-center text-gray-500 italic">
                                        Belum ada laporan masuk.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
