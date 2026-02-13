<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 leading-tight">
            {{ __('Tulis Berita Baru') }}
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
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Form Artikel Baru
                        </h3>
                        <p class="text-sm text-gray-500 mt-1">Isi formulir di bawah ini untuk mempublikasikan berita atau kegiatan baru.</p>
                    </div>

                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel</label>
                                    <input type="text" name="judul" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition"
                                           required placeholder="Contoh: Kunjungan Kerja Gubernur ke..." value="{{ old('judul') }}">
                                    @error('judul')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Kategori</label>
                                    <div class="relative">
                                        <select name="kategori" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 appearance-none bg-white cursor-pointer transition">
                                            <option value="berita">🔵 Berita Umum</option>
                                            <option value="kegiatan">🟢 Agenda Kegiatan</option>
                                            <option value="pengumuman">🟡 Pengumuman</option>
                                        </select>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div x-data="{ photoName: null, photoPreview: null }" class="col-span-1">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Utama</label>

                                <input type="file" class="hidden" x-ref="photo" name="gambar"
                                       x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => { photoPreview = e.target.result; };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                       ">

                                <div class="mt-2 flex flex-col items-center justify-center p-6 border-2 border-dashed border-gray-300 rounded-xl hover:bg-gray-50 transition cursor-pointer h-full min-h-[160px]" x-on:click.prevent="$refs.photo.click()">

                                    <div x-show="!photoPreview" class="text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <p class="mt-1 text-sm text-gray-600">Klik untuk upload gambar</p>
                                        <p class="text-xs text-gray-400">PNG, JPG, JPEG (Max. 2MB)</p>
                                    </div>

                                    <div x-show="photoPreview" style="display: none;" class="text-center w-full h-full">
                                        <span class="block h-40 w-auto rounded-lg shadow-md bg-cover bg-center bg-no-repeat mx-auto mb-3"
                                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                        </span>
                                        <p class="text-xs text-green-600 font-bold">Gambar siap diterbitkan</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Isi Artikel</label>
                            <div class="relative">
                                <textarea name="isi" rows="12"
                                          class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 transition p-4 leading-relaxed font-serif text-gray-700"
                                          placeholder="Mulai menulis berita di sini..." required>{{ old('isi') }}</textarea>

                                <div class="absolute bottom-4 right-4 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('admin.posts.index') }}" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-50 hover:text-gray-800 font-semibold transition">
                                Batal
                            </a>
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-bold py-2.5 px-8 rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200 flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Terbitkan Berita
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
