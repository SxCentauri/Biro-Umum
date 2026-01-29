<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-500 text-sm">Total Tiket</div>
                    <div class="text-3xl font-bold">{{ $totalTickets }}</div>
                </div>
                <div class="bg-red-100 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-red-500">
                    <div class="text-red-600 text-sm font-bold">Perlu Tindakan (Pending)</div>
                    <div class="text-3xl font-bold text-red-700">{{ $pendingTickets }}</div>
                </div>
                <div class="bg-yellow-100 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-yellow-500">
                    <div class="text-yellow-600 text-sm font-bold">Sedang Dikerjakan</div>
                    <div class="text-3xl font-bold text-yellow-700">{{ $processTickets }}</div>
                </div>
                <div class="bg-green-100 overflow-hidden shadow-sm sm:rounded-lg p-6 border-l-4 border-green-500">
                    <div class="text-green-600 text-sm font-bold">Selesai</div>
                    <div class="text-3xl font-bold text-green-700">{{ $doneTickets }}</div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Tiket Laporan Terbaru</h3>
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b">
                                <th class="p-2">Tanggal</th>
                                <th class="p-2">Pelapor</th>
                                <th class="p-2">Masalah</th>
                                <th class="p-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentTickets as $ticket)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="p-2">{{ $ticket->created_at->format('d M Y') }}</td>
                                <td class="p-2">{{ $ticket->user->name }}</td>
                                <td class="p-2">{{Str::limit($ticket->judul_laporan, 30)}}</td>
                                <td class="p-2">
                                    <span class="px-2 py-1 text-xs rounded
                                        {{ $ticket->status == 'pending' ? 'bg-red-200 text-red-800' : '' }}
                                        {{ $ticket->status == 'process' ? 'bg-yellow-200 text-yellow-800' : '' }}
                                        {{ $ticket->status == 'done' ? 'bg-green-200 text-green-800' : '' }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">Belum ada laporan masuk.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
