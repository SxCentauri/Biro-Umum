<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rekapitulasi Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.report.index') }}" method="GET" class="mb-6 flex flex-wrap gap-4 items-end border-b pb-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700">Dari Tanggal</label>
                            <input type="date" name="start_date" value="{{ $startDate }}" class="border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-700">Sampai Tanggal</label>
                            <input type="date" name="end_date" value="{{ $endDate }}" class="border-gray-300 rounded-md shadow-sm">
                        </div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Tampilkan Data
                        </button>

                        <a href="{{ route('admin.report.print', ['start_date' => $startDate, 'end_date' => $endDate]) }}" target="_blank" class="bg-gray-800 text-white px-4 py-2 rounded-md hover:bg-gray-700 ml-auto flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak Laporan
                        </a>
                    </form>

                    <table class="min-w-full text-sm border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-2 border">Tgl</th>
                                <th class="p-2 border">Pelapor</th>
                                <th class="p-2 border">Masalah</th>
                                <th class="p-2 border">Status</th>
                                <th class="p-2 border">Teknisi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tickets as $ticket)
                            <tr>
                                <td class="p-2 border">{{ $ticket->created_at->format('d/m/Y') }}</td>
                                <td class="p-2 border">{{ $ticket->user->name }}</td>
                                <td class="p-2 border">{{ $ticket->judul_laporan }}</td>
                                <td class="p-2 border text-center">
                                    <span class="px-2 py-1 rounded text-xs font-bold
                                        {{ $ticket->status == 'done' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($ticket->status) }}
                                    </span>
                                </td>
                                <td class="p-2 border">{{ $ticket->catatan_teknisi ?? '-' }}</td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="p-4 text-center">Tidak ada data di rentang tanggal ini.</td></tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
