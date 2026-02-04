<x-guest-layout>
    <div class="mb-6 text-center">
        <h4 class="text-2xl font-bold text-gray-800">Buat Akun Baru 🚀</h4>
        <p class="text-sm text-gray-500 mt-2">Lengkapi data diri untuk mengakses sistem</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div class="group">
            <x-input-label for="name" :value="__('Nama Lengkap')" class="text-gray-700 font-bold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <x-text-input id="name"
                    class="block w-full pl-10 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 sm:text-sm py-3 !bg-white !text-gray-900 placeholder-gray-400 transition-all duration-300"
                    type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name"
                    placeholder="Nama Pegawai (Sesuai SK)" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="group">
            <x-input-label for="email" :value="__('Email Pegawai')" class="text-gray-700 font-bold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                </div>
                <x-text-input id="email"
                    class="block w-full pl-10 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 sm:text-sm py-3 !bg-white !text-gray-900 placeholder-gray-400 transition-all duration-300"
                    type="email" name="email" :value="old('email')"
                    required autocomplete="username"
                    placeholder="nama@bengkuluprov.go.id" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="group">
            <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-bold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 sm:text-sm py-3 !bg-white !text-gray-900 placeholder-gray-400 transition-all duration-300"
                    type="password" name="password"
                    required autocomplete="new-password"
                    placeholder="Minimal 8 karakter" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="group">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-gray-700 font-bold mb-1" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <x-text-input id="password_confirmation"
                    class="block w-full pl-10 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 sm:text-sm py-3 !bg-white !text-gray-900 placeholder-gray-400 transition-all duration-300"
                    type="password" name="password_confirmation"
                    required autocomplete="new-password"
                    placeholder="Ulangi password di atas" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:scale-95">
                {{ __('DAFTAR SEKARANG') }}
            </button>
        </div>

        <div class="text-center mt-6 pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-500">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-bold text-blue-600 hover:text-blue-800 transition underline decoration-transparent hover:decoration-blue-600">
                    Login di sini
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
