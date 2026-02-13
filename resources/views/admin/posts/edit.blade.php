<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50/50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 100)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-4"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">

                <div class="p-8 text-gray-900">

                    <div class="mb-8 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                            Form Perubahan Artikel
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Silakan sunting informasi berita di bawah ini.</p>
                    </div>

                    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
                                    <input type="text" name="judul" value="{{ old('judul', $post->judul) }}"
                                           class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                           placeholder="Masukkan judul berita yang menarik..." required>
                                    @error('judul')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                                    <div class="relative">
                                        <select name="kategori" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 appearance-none bg-white cursor-pointer transition">
                                            <option value="berita" {{ $post->kategori == 'berita' ? 'selected' : '' }}>🔵 Berita Umum</option>
                                            <option value="kegiatan" {{ $post->kategori == 'kegiatan' ? 'selected' : '' }}>🟢 Agenda Kegiatan</option>
                                            <option value="pengumuman" {{ $post->kategori == 'pengumuman' ? 'selected' : '' }}>🟡 Pengumuman</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Sampul</label>

                                <input type="file" class="hidden" x-ref="photo" name="gambar"
                                       x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                       ">

                                <div class="mt-2 flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 rounded-xl hover:bg-gray-50 transition cursor-pointer" x-on:click.prevent="$refs.photo.click()">

                                    <div x-show="!photoPreview" class="text-center">
                                        @if($post->gambar)
                                            <img src="{{ asset('storage/' . $post->gambar) }}" class="h-40 w-auto object-cover rounded-lg shadow-md mx-auto mb-3">
                                            <p class="text-xs text-gray-500">Klik untuk mengganti gambar ini</p>
                                        @else
                                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <p class="mt-1 text-sm text-gray-600">Klik untuk upload gambar baru</p>
                                        @endif
                                    </div>

                                    <div x-show="photoPreview" style="display: none;" class="text-center">
                                        <span class="block h-40 w-auto rounded-lg shadow-md bg-cover bg-center bg-no-repeat mx-auto mb-3"
                                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                        <p class="text-xs text-green-600 font-bold">Gambar baru siap diupload</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Isi Artikel</label>
                            <div class="relative">
                                <textarea name="isi" rows="12"
                                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition p-4 leading-relaxed font-serif text-gray-700"
                                          placeholder="Tuliskan isi berita di sini..." required>{{ old('isi', $post->isi) }}</textarea>

                                <div class="absolute bottom-4 right-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('admin.posts.index') }}" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-gray-800 font-semibold transition">
                                Batal
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-2.5 px-8 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
