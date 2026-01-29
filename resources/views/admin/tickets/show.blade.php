<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tindak Lanjut Laporan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 border-b pb-6">
                        <div>
                            <h3 class="text-lg font-bold mb-4 text-gray-700">Detail Pelapor</h3>
                            <p><strong>Nama:</strong> {{ $ticket->user->name }}</p>
                            <p><strong>Unit Kerja:</strong> {{ $ticket->user->unit_kerja ?? '-' }}</p>
                            <p><strong>Tanggal Lapor:</strong> {{ $ticket->created_at->format('d M Y, H:i') }} WIB</p>
                            <p><strong>Lokasi:</strong> {{ $ticket->lokasi_ruangan }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-4 text-gray-700">Masalah</h3>
                            <p class="text-xl font-semibold">{{ $ticket->judul_laporan }}</p>
                            <p class="text-gray-600 mt-2">{{ $ticket->deskripsi_masalah }}</p>
                        </div>
                    </div>

                    @if($ticket->foto_bukti)
                    <div class="mb-6 border-b pb-6">
                        <h3 class="text-lg font-bold mb-4 text-gray-700">Foto Bukti</h3>
                        <img src="{{ asset('storage/' . $ticket->foto_bukti) }}" alt="Bukti Kerusakan" class="rounded-lg shadow-md max-h-80 object-cover">
                    </div>
                    @endif

                    <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Update Status</label>
                            <select name="status" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Menunggu (Pending)</option>
                                <option value="process" {{ $ticket->status == 'process' ? 'selected' : '' }}>Sedang Dikerjakan (Process)</option>
                                <option value="done" {{ $ticket->status == 'done' ? 'selected' : '' }}>Selesai (Done)</option>
                            </select>
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Catatan Teknisi (Solusi)</label>
                            <textarea name="catatan_teknisi" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Contoh: Kabel LAN diganti baru...">{{ $ticket->catatan_teknisi }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-md">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
