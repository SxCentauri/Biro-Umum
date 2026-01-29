<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket; // <--- PENTING: Jangan lupa baris ini agar Model Ticket terbaca

class AdminController extends Controller
{
    public function index()
    {
        // 1. Ambil Data Statistik untuk Dashboard
        // Menggunakan helper 'count()' untuk menghitung jumlah baris di database
        $totalTickets = Ticket::count();
        $pendingTickets = Ticket::where('status', 'pending')->count();
        $processTickets = Ticket::where('status', 'process')->count();
        $doneTickets = Ticket::where('status', 'done')->count();

        // 2. Ambil 5 Tiket Terbaru (Opsional, untuk tabel mini)
        // 'with('user')' berguna untuk mengambil nama pelapor sekaligus
        $recentTickets = Ticket::with('user')->latest()->take(5)->get();

        // 3. Kirim semua variabel di atas ke View 'admin.dashboard'
        return view('admin.dashboard', compact(
            'totalTickets',
            'pendingTickets',
            'processTickets',
            'doneTickets',
            'recentTickets'
        ));
    }
}
