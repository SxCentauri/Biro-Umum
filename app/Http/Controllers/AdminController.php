<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class AdminController extends Controller
{
    public function index()
    {
        $totalTickets   = Ticket::count();
        $pendingTickets = Ticket::where('status', 'pending')->count();
        $processTickets = Ticket::where('status', 'process')->count();
        $doneTickets    = Ticket::where('status', 'done')->count();
        $recentTickets  = Ticket::with('user')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalTickets',
            'pendingTickets',
            'processTickets',
            'doneTickets',
            'recentTickets'
        ));
    }

    public function show($id)
    {
        $ticket = Ticket::with('user')->findOrFail($id);

        return view('admin.tickets.show', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,process,done',
            'catatan_teknisi' => 'nullable|string'
        ]);

        $ticket->update([
            'status' => $request->status,
            'catatan_teknisi' => $request->catatan_teknisi,
            'tanggal_selesai' => $request->status == 'done' ? now() : null,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Status tiket berhasil diperbarui!');
    }
}
