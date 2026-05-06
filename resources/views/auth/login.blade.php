<x-guest-layout>
    <div class="mb-8 text-center">
        <h4 class="text-2xl font-bold text-gray-800">Selamat Datang 👋</h4>
        <p class="text-sm text-gray-500 mt-2">Silakan login menggunakan akun pegawai Anda</p>
    </div>

    <x-auth-session-status class="mb-4 text-center text-green-600 font-medium bg-green-50 p-3 rounded-lg border border-green-200" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

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
                    required autofocus autocomplete="username"
                    placeholder="nama@bengkuluprov.go.id" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="group">
            <div class="flex justify-between items-center mb-1">
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-bold" />
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-blue-500 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input id="password"
                    class="block w-full pl-10 border-gray-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-500/20 sm:text-sm py-3 !bg-white !text-gray-900 placeholder-gray-400 transition-all duration-300"
                    type="password" name="password"
                    required autocomplete="current-password"
                    placeholder="••••••••" />
            </div>

            <div class="flex justify-end mt-1">
                @if (Route::has('password.request'))
                    <a class="text-xs text-blue-600 hover:text-blue-800 font-semibold hover:underline transition" href="{{ route('password.request') }}">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 text-sm" />
        </div>

        <div class="space-y-4">
            <div class="flex items-center">
                <input id="remember_me" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded cursor-pointer" name="remember">
                <label for="remember_me" class="ml-2 block text-sm text-gray-600 cursor-pointer select-none">
                    {{ __('Ingat Saya') }}
                </label>
            </div>

            <button type="submit" class="w-full flex justify-center py-3.5 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:scale-95">
                {{ __('MASUK KE SISTEM') }}
            </button>
        </div>
    </form>
</x-guest-layout>
