<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Biro Umum Provinsi Bengkulu</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased flex flex-col min-h-screen">

    @include('web-profile.layouts.navbar')

    <section class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 text-center">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">Hubungi Kami</h1>
            <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                Kami siap membantu. Silakan kirim pesan, pertanyaan, atau kunjungi kantor kami pada jam kerja operasional.
            </p>
        </div>
    </section>

    <section class="py-12 bg-gray-50 flex-grow mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                <div class="space-y-8">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-6">Informasi Kontak</h3>

                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-base font-semibold text-gray-900">Alamat Kantor</h4>
                                    <p class="mt-1 text-gray-600 leading-relaxed">
                                        Kompleks Kantor Gubernur Bengkulu<br>
                                        Jl. Pembangunan No. 1, Padang Harapan,<br>
                                        Kec. Gading Cempaka, Kota Bengkulu 38225
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="p-3 bg-green-50 text-green-600 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-base font-semibold text-gray-900">Kontak Langsung</h4>
                                    <p class="mt-1 text-gray-600">
                                        Telepon: (0736) 21xxx<br>
                                        Email: <a href="mailto:biroumum@bengkuluprov.go.id" class="text-blue-600 hover:underline">biroumum@bengkuluprov.go.id</a>
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start">
                                <div class="flex-shrink-0 mt-1">
                                    <div class="p-3 bg-yellow-50 text-yellow-600 rounded-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-base font-semibold text-gray-900">Jam Operasional</h4>
                                    <p class="mt-1 text-gray-600">
                                        Senin - Kamis: 08.00 - 16.00 WIB<br>
                                        Jumat: 08.00 - 16.30 WIB<br>
                                        Sabtu - Minggu: Libur
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>

                    <form action="#" method="POST" class="space-y-5">
                        <div>
                            <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Alamat Email</label>
                            <input type="email" id="email" name="email" placeholder="contoh@email.com" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                        </div>

                        <div>
                            <label for="subjek" class="block text-sm font-medium text-gray-700 mb-1">Subjek</label>
                            <input type="text" id="subjek" name="subjek" placeholder="Perihal pesan" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition" required>
                        </div>

                        <div>
                            <label for="pesan" class="block text-sm font-medium text-gray-700 mb-1">Pesan Anda</label>
                            <textarea id="pesan" name="pesan" rows="4" placeholder="Tuliskan pesan, saran, atau pertanyaan Anda di sini..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-y" required></textarea>
                        </div>

                        <button type="submit" class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                            Kirim Pesan
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white border-t-4 border-yellow-500 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-4">BIRO UMUM</h3>
                    <p class="text-gray-400 mb-4 text-sm leading-relaxed">
                        Sekretariat Daerah Provinsi Bengkulu. <br>
                        Melayani kebutuhan rumah tangga pimpinan, <br>
                        keprotokolan, dan administrasi keuangan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
                        <a href="#" class="text-gray-400 hover:text-white transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.072 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2 inline-block">Tautan Cepat</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Pemerintah Provinsi Bengkulu</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Layanan LPSE</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Jaringan Dokumentasi Hukum</a></li>
                        <li><a href="#" class="hover:text-yellow-400 transition">→ Login Admin/Pegawai</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold text-white mb-4 border-b border-gray-700 pb-2 inline-block">Hubungi Kami</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Jl. Pembangunan No. 1, Padang Harapan, Kota Bengkulu, 38225
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            (0736) 21xxx
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-yellow-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            biroumum@bengkuluprov.go.id
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} Biro Umum Kantor Gubernur Provinsi Bengkulu. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>
