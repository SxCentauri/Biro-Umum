<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebProfileController extends Controller
{
    /**
     * Halaman Depan (Landing Page)
     */
    public function index()
    {
        // Nanti di sini kita bisa ambil data Berita dari database
        // $berita = \App\Models\News::latest()->take(3)->get();

        return view('web-profile.index');
    }

    /**
     * Halaman Profil (Visi Misi, Sejarah, Struktur)
     * Catatan: Karena menu profilmu banyak (bertingkat),
     * nanti kita bisa buat view ini menerima parameter "jenis profil"
     */
    public function profil()
    {
        return view('web-profile.profil');
    }

    /**
     * Halaman Layanan Pengaduan / Info Layanan
     */
    public function layanan()
    {
        return view('web-profile.layanan');
    }

    /**
     * Halaman Kontak
     */
    public function kontak()
    {
        return view('web-profile.kontak');
    }
}
