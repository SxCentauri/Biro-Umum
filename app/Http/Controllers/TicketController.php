<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())
                        ->latest()
                        ->get();

        return view('user.dashboard', compact('tickets'));
    }

    public function create()
    {
        return view('user.ticket.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:255',
            'deskripsi_masalah' => 'required|string',
            'lokasi_ruangan' => 'required|string|max:100',
            'foto_bukti' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Max 2MB
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $fotoPath = $request->file('foto_bukti')->store('bukti_kerusakan', 'public');
        }

        Ticket::create([
            'user_id' => Auth::id(),
            'judul_laporan' => $request->judul_laporan,
            'deskripsi_masalah' => $request->deskripsi_masalah,
            'lokasi_ruangan' => $request->lokasi_ruangan,
            'foto_bukti' => $fotoPath,
            'status' => 'pending',
        ]);

        return redirect()->route('dashboard')->with('success', 'Laporan berhasil dikirim!');
    }
}
