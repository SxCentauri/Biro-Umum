<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
                            <input type="text" name="judul" value="{{ old('judul', $post->judul) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                            <select name="kategori" class="w-full border-gray-300 rounded-md shadow-sm">
                                <option value="berita" {{ $post->kategori == 'berita' ? 'selected' : '' }}>Berita Umum</option>
                                <option value="kegiatan" {{ $post->kategori == 'kegiatan' ? 'selected' : '' }}>Agenda Kegiatan</option>
                                <option value="pengumuman" {{ $post->kategori == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar (Opsional)</label>
                            @if($post->gambar)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $post->gambar) }}" class="h-32 rounded shadow-sm">
                                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                                </div>
                            @endif
                            <input type="file" name="gambar" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Isi Artikel</label>
                            <textarea name="isi" rows="10" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ old('isi', $post->isi) }}</textarea>
                        </div>

                        <div class="flex items-center gap-4">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow-md">
                                Perbarui Berita
                            </button>
                            <a href="{{ route('admin.posts.index') }}" class="text-gray-500 hover:text-gray-700">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
