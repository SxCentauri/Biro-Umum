<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Berita & Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-bold">Daftar Postingan</h3>
                        <a href="{{ route('admin.posts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">
                            + Tulis Berita Baru
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Gambar</th>
                                    <th class="py-3 px-6 text-left">Judul</th>
                                    <th class="py-3 px-6 text-left">Kategori</th>
                                    <th class="py-3 px-6 text-center">Tanggal</th>
                                    <th class="py-3 px-6 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @forelse($posts as $post)
                                <tr class="border-b border-gray-200 hover:bg-gray-50">
                                    <td class="py-3 px-6 text-left">
                                        @if($post->gambar)
                                            <img src="{{ asset('storage/' . $post->gambar) }}" class="w-16 h-10 object-cover rounded">
                                        @else
                                            <span class="text-gray-400">No Image</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-6 text-left font-medium max-w-xs truncate">
                                        {{ $post->judul }}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <span class="px-2 py-1 rounded text-xs font-bold
                                            {{ $post->kategori == 'berita' ? 'bg-blue-100 text-blue-700' : '' }}
                                            {{ $post->kategori == 'kegiatan' ? 'bg-green-100 text-green-700' : '' }}
                                            {{ $post->kategori == 'pengumuman' ? 'bg-yellow-100 text-yellow-700' : '' }}">
                                            {{ strtoupper($post->kategori) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{ $post->created_at->format('d M Y') }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center space-x-2">
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="text-blue-500 hover:text-blue-700 transform hover:scale-110">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 transform hover:scale-110">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="py-6 text-center text-gray-500">Belum ada berita yang ditulis.</td>
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
