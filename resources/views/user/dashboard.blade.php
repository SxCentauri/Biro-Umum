<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Pegawai') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Berhasil!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Riwayat Laporan Saya</h3>
                        <a href="{{ route('ticket.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">
                            + Buat Tiket Baru
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Tanggal</th>
                                    <th class="py-3 px-6 text-left">Judul Laporan</th>
                                    <th class="py-3 px-6 text-left">Lokasi</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse($tickets as $ticket)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{ $ticket->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-3 px-6 text-left font-medium">
                                        {{ $ticket->judul_laporan }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        {{ $ticket->lokasi_ruangan }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if($ticket->status == 'pending')
                                            <span class="bg-red-200 text-red-700 py-1 px-3 rounded-full text-xs">Menunggu</span>
                                        @elseif($ticket->status == 'process')
                                            <span class="bg-yellow-200 text-yellow-700 py-1 px-3 rounded-full text-xs">Diproses</span>
                                        @else
                                            <span class="bg-green-200 text-green-700 py-1 px-3 rounded-full text-xs">Selesai</span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500">
                                        Anda belum pernah membuat laporan.
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
