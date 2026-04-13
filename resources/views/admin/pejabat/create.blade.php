<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div>
                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    {{ __('Tambah Pejabat Baru') }}
                </h2>
                <p class="text-sm text-gray-500 mt-1">Masukkan data pejabat untuk menambahkan ke struktur organisasi.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.profil.index') }}" class="inline-flex items-center bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 text-sm font-semibold shadow-sm transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8 bg-gray-50/50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-gray-200">
                <div class="p-6 border-b border-gray-100 bg-gray-50/30">
                    <h3 class="font-bold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
                        Form Data Pejabat
                    </h3>
                </div>

                <div class="p-6 md:p-8">
                    <form action="{{ route('admin.pejabat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-6">
                                <div>
                                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap (beserta gelar)</label>
                                    <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 @error('nama') border-red-500 @enderror" required placeholder="Contoh: A. GUNAWAN, S.Sos">
                                    @error('nama') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">Nama Jabatan</label>
                                    <input type="text" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 @error('jabatan') border-red-500 @enderror" required placeholder="Contoh: Kepala Biro Umum">
                                    @error('jabatan') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="pangkat_golongan" class="block text-sm font-medium text-gray-700 mb-2">Pangkat / Golongan</label>
                                        <input type="text" id="pangkat_golongan" name="pangkat_golongan" value="{{ old('pangkat_golongan') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Opsional">
                                    </div>
                                    <div>
                                        <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">NIP</label>
                                        <input type="text" id="nip" name="nip" value="{{ old('nip') }}" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Opsional">
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-6">
                                <div>
                                    <label for="level" class="block text-sm font-medium text-gray-700 mb-2">Posisi Cabang Hierarki</label>
                                    <select id="level" name="level" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:ring-blue-500 focus:border-blue-500 @error('level') border-red-500 @enderror" required>
                                        <option value="" disabled selected>-- Pilih Posisi --</option>
                                        <option value="kepala" @selected(old('level') == 'kepala')>Level 1 - Kepala Biro</option>
                                        <optgroup label="Level 2 - Kepala Bagian">
                                            <option value="kabag_rt" @selected(old('level') == 'kabag_rt')>Kabag Rumah Tangga</option>
                                            <option value="kabag_keuangan" @selected(old('level') == 'kabag_keuangan')>Kabag Adm. Keuangan & Aset</option>
                                            <option value="kabag_protokol" @selected(old('level') == 'kabag_protokol')>Kabag Protokol & Adm. Pimpinan</option>
                                        </optgroup>
                                        <optgroup label="Level 3 - Sub Bagian / Tim Kerja">
                                            <option value="sub_rt" @selected(old('level') == 'sub_rt')>Sub/Tim - Rumah Tangga</option>
                                            <option value="sub_keuangan" @selected(old('level') == 'sub_keuangan')>Sub/Tim - Keuangan & Aset</option>
                                            <option value="sub_protokol" @selected(old('level') == 'sub_protokol')>Sub/Tim - Protokol</option>
                                        </optgroup>
                                    </select>
                                    @error('level') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                </div>

                                <div x-data="imageViewer()">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Profil (Opsional)</label>

                                    <div class="flex items-center gap-6">
                                        <div class="w-24 h-24 rounded-xl border border-gray-200 bg-gray-50 flex items-center justify-center overflow-hidden flex-shrink-0 shadow-sm">
                                            <template x-if="imageUrl">
                                                <img :src="imageUrl" class="w-full h-full object-cover">
                                            </template>
                                            <template x-if="!imageUrl">
                                                <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </template>
                                        </div>

                                        <div class="flex-grow">
                                            <label class="cursor-pointer bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium transition inline-block">
                                                <span>Pilih File Gambar</span>
                                                <input type="file" name="foto" accept="image/*" class="hidden" @change="fileChosen">
                                            </label>
                                            <p class="text-xs text-gray-500 mt-2">Maksimal 2MB. Format JPG/PNG. Rasio disarankan 1:1 (persegi).</p>
                                            @error('foto') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-100 mb-6">

                        <div class="flex justify-end gap-3">
                            <a href="{{ route('admin.profil.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-semibold transition">Batal</a>
                            <button type="submit" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 text-sm font-semibold shadow-sm transition">Simpan Pejabat</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
        function imageViewer() {
            return {
                imageUrl: '',
                fileChosen(event) {
                    this.fileToDataUrl(event, src => this.imageUrl = src)
                },
                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return
                    let file = event.target.files
                    let reader = new FileReader()
                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                },
            }
        }
    </script>
</x-app-layout>
