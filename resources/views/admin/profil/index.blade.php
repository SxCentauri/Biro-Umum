<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Manajemen Profil & Organisasi') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola Visi Misi dan Struktur Hierarki Pejabat Biro Umum.</p>
            </div>
            <div class="mt-4 md:mt-0 flex items-center bg-white px-4 py-2 rounded-lg shadow-sm border border-gray-100">
                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                <span class="text-sm font-medium text-gray-600">
                    {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
    </x-slot>

    <style>
        .ck-editor__editable_inline {
            min-height: 180px; /* Minimal tinggi kotak editor */
            border-bottom-left-radius: 0.5rem !important;
            border-bottom-right-radius: 0.5rem !important;
        }
        .ck-toolbar {
            border-top-left-radius: 0.5rem !important;
            border-top-right-radius: 0.5rem !important;
            background-color: #f9fafb !important;
            border-color: #d1d5db !important;
        }
    </style>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm flex justify-between items-center">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                    <button @click="show = false" class="text-green-500 hover:text-green-700">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-200">
                <div class="p-6 border-b border-gray-100 bg-gray-50/30">
                    <h3 class="font-bold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        Pengaturan Visi & Misi
                    </h3>
                </div>

                <div class="p-6">
                    <form action="{{ route('admin.profil.update-visi-misi') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="visi" class="block text-sm font-medium text-gray-700 mb-2">Visi Instansi</label>
                                <textarea id="visi" name="visi" rows="9" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 @error('visi') border-red-500 @enderror" required placeholder="Tuliskan Visi Biro Umum...">{{ old('visi', $visiMisi->visi ?? '') }}</textarea>
                                @error('visi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            <div>
                                <label for="misi" class="block text-sm font-medium text-gray-700 mb-2">Misi Instansi</label>
                                <textarea id="misi" name="misi" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 @error('misi') border-red-500 @enderror" placeholder="Tuliskan Misi di sini...">{{ old('misi', $visiMisi->misi ?? '') }}</textarea>
                                @error('misi') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="inline-flex items-center bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 text-sm font-semibold shadow-sm transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Visi & Misi
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-200">
                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center bg-gray-50/30 gap-4">
                    <div class="relative w-full md:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" placeholder="Cari pejabat..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 w-full md:w-64" disabled title="Fitur pencarian segera hadir">
                    </div>

                    <a href="{{ route('admin.pejabat.create') }}" class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 text-sm font-semibold shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tambah Pejabat Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-24 text-center">Foto</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama & Jabatan</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Pangkat / NIP</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Posisi Cabang</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($pejabats as $pejabat)
                            <tr class="hover:bg-blue-50/30 transition duration-150 group">
                                <td class="px-6 py-4 align-middle">
                                    <div class="relative h-12 w-12 mx-auto rounded-full overflow-hidden shadow-sm border border-gray-200 group-hover:shadow-md transition">
                                        @if($pejabat->foto)
                                            <img src="{{ asset('storage/' . $pejabat->foto) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    <div class="max-w-md">
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1 hover:text-blue-600 transition">
                                            {{ $pejabat->nama }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1 line-clamp-1">
                                            {{ $pejabat->jabatan }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 align-middle">
                                    <div class="text-sm font-medium text-gray-700">{{ $pejabat->pangkat_golongan ?? '-' }}</div>
                                    <div class="text-xs text-gray-400 mt-1">NIP. {{ $pejabat->nip ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4 align-middle text-center">
                                    @php
                                        $badges = [
                                            'kepala' => 'bg-purple-50 text-purple-700 border-purple-200',
                                            'kabag_keuangan' => 'bg-blue-50 text-blue-700 border-blue-200',
                                            'sub_keuangan' => 'bg-white text-blue-600 border-blue-100',
                                            'kabag_rt' => 'bg-green-50 text-green-700 border-green-200',
                                            'sub_rt' => 'bg-white text-green-600 border-green-100',
                                            'kabag_protokol' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                            'sub_protokol' => 'bg-white text-yellow-600 border-yellow-100',
                                        ];
                                        $label = str_replace('_', ' ', strtoupper($pejabat->level));
                                        $badgeClass = $badges[$pejabat->level] ?? 'bg-gray-100 text-gray-700';
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-bold border {{ $badgeClass }} tracking-wide">
                                        {{ $label }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 align-middle text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.pejabat.edit', $pejabat->id) }}" class="p-2 bg-white border border-gray-200 rounded-lg text-yellow-600 hover:bg-yellow-50 hover:border-yellow-300 transition shadow-sm" title="Edit Data">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <form action="{{ route('admin.pejabat.destroy', $pejabat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pejabat ini secara permanen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-white border border-gray-200 rounded-lg text-red-600 hover:bg-red-50 hover:border-red-300 transition shadow-sm" title="Hapus Data">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <div class="p-4 bg-gray-50 rounded-full mb-3 shadow-inner">
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada data struktur organisasi</h3>
                                        <p class="text-sm text-gray-500 mt-1 max-w-xs mx-auto">Silakan tambahkan data pejabat untuk menyusun struktur organisasi biro.</p>
                                        <div class="mt-6">
                                            <a href="{{ route('admin.pejabat.create') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm hover:underline">
                                                Tambah Pejabat Sekarang &rarr;
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex justify-between items-center">
                    <span class="text-xs text-gray-500">Menampilkan total {{ $pejabats->count() }} data pejabat terdaftar.</span>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#misi'), {
                    toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo' ]
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
</x-app-layout>
