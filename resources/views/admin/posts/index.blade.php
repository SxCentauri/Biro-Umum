<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Manajemen Berita & Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div x-data="{ show: true }" x-show="show" class="mb-6 bg-green-50 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded shadow-sm flex justify-between items-center transition duration-300">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ session('success') }}
                    </div>
                    <button @click="show = false" class="text-green-700 hover:text-green-900">&times;</button>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-gray-100">
                <div class="p-6 text-gray-900">

                    <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
                        <h3 class="text-xl font-bold text-gray-800 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                            Daftar Postingan
                        </h3>
                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 text-sm font-semibold shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Tulis Berita Baru
                        </a>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="py-4 px-6 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Gambar</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Judul Artikel</th>
                                    <th class="py-4 px-6 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th class="py-4 px-6 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Tanggal</th>
                                    <th class="py-4 px-6 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($posts as $post)
                                <tr class="hover:bg-gray-50 transition duration-150">
                                    <td class="py-4 px-6 align-middle">
                                        @if($post->gambar)
                                            <div class="h-12 w-20 rounded-md overflow-hidden shadow-sm border border-gray-200">
                                                <img src="{{ asset('storage/' . $post->gambar) }}" class="w-full h-full object-cover">
                                            </div>
                                        @else
                                            <div class="h-12 w-20 bg-gray-100 rounded-md flex items-center justify-center text-xs text-gray-400 border border-gray-200">
                                                No Img
                                            </div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 align-middle">
                                        <div class="text-sm font-semibold text-gray-800 line-clamp-2" title="{{ $post->judul }}">
                                            {{ $post->judul }}
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 align-middle">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border
                                            {{ $post->kategori == 'berita' ? 'bg-blue-50 text-blue-700 border-blue-200' : '' }}
                                            {{ $post->kategori == 'kegiatan' ? 'bg-green-50 text-green-700 border-green-200' : '' }}
                                            {{ $post->kategori == 'pengumuman' ? 'bg-yellow-50 text-yellow-700 border-yellow-200' : '' }}">
                                            {{ strtoupper($post->kategori) }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 align-middle text-center text-sm text-gray-500">
                                        {{ $post->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-4 px-6 align-middle text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="group p-2 rounded-full bg-yellow-50 text-yellow-600 hover:bg-yellow-100 transition shadow-sm border border-yellow-200" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>

                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition shadow-sm border border-red-200" title="Hapus">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-gray-500 flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                        <span class="text-lg font-medium text-gray-600">Belum ada berita</span>
                                        <p class="text-sm text-gray-400 mt-1">Silakan klik tombol di atas untuk membuat postingan baru.</p>
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
