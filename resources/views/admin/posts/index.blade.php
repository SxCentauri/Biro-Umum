<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Manajemen Berita (CMS)') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Kelola artikel, kegiatan, dan pengumuman instansi.</p>
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

                <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center bg-gray-50/30 gap-4">
                    <div class="relative w-full md:w-auto">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" placeholder="Cari artikel..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 w-full md:w-64" disabled title="Fitur pencarian segera hadir">
                    </div>

                    <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 text-sm font-semibold shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        Tulis Berita Baru
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-white border-b border-gray-200">
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider w-24 text-center">Gambar</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Judul & Cuplikan</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Kategori</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-center">Tanggal</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($posts as $post)
                            <tr class="hover:bg-blue-50/30 transition duration-150 group">
                                <td class="px-6 py-4 align-middle">
                                    <div class="relative h-14 w-20 rounded-lg overflow-hidden shadow-sm border border-gray-200 group-hover:shadow-md transition">
                                        @if($post->gambar)
                                            <img src="{{ asset('storage/' . $post->gambar) }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-gray-100 flex items-center justify-center text-xs text-gray-400">
                                                No Img
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-middle">
                                    <div class="max-w-md">
                                        <div class="text-sm font-bold text-gray-900 line-clamp-1 hover:text-blue-600 transition cursor-pointer" title="{{ $post->judul }}">
                                            {{ $post->judul }}
                                        </div>
                                        <div class="text-xs text-gray-500 mt-1 line-clamp-1">
                                            {{ Str::limit(strip_tags($post->isi), 60) }}
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-middle text-center">
                                    @php
                                        $katClass = match($post->kategori) {
                                            'berita' => 'bg-blue-50 text-blue-700 border-blue-200',
                                            'kegiatan' => 'bg-purple-50 text-purple-700 border-purple-200',
                                            'pengumuman' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                            default => 'bg-gray-100 text-gray-700'
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $katClass }} uppercase tracking-wide">
                                        {{ $post->kategori }}
                                    </span>
                                </td>

                                <td class="px-6 py-4 align-middle text-center text-sm text-gray-500">
                                    <div class="flex flex-col">
                                        <span class="font-medium text-gray-700">{{ $post->created_at->format('d M Y') }}</span>
                                        <span class="text-xs text-gray-400">{{ $post->created_at->format('H:i') }} WIB</span>
                                    </div>
                                </td>

                                <td class="px-6 py-4 align-middle text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="p-2 bg-white border border-gray-200 rounded-lg text-yellow-600 hover:bg-yellow-50 hover:border-yellow-300 transition shadow-sm" title="Edit Berita">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>

                                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-white border border-gray-200 rounded-lg text-red-600 hover:bg-red-50 hover:border-red-300 transition shadow-sm" title="Hapus Berita">
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
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada berita</h3>
                                        <p class="text-sm text-gray-500 mt-1 max-w-xs mx-auto">Mulai publikasikan informasi kegiatan biro dengan menekan tombol "Tulis Berita Baru".</p>
                                        <div class="mt-6">
                                            <a href="{{ route('admin.posts.create') }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm hover:underline">
                                                Buat Postingan Pertama &rarr;
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
                    <span class="text-xs text-gray-500">Menampilkan {{ $posts->count() }} data artikel.</span>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>
