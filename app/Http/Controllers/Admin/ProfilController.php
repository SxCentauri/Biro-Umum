<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VisiMisi;
use App\Models\Pejabat;

class ProfilController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first();

        $pejabats = Pejabat::orderBy('level')->get();

        return view('admin.profil.index', compact('visiMisi', 'pejabats'));
    }

    public function updateVisiMisi(Request $request)
    {
        $request->validate([
            'visi' => 'required|string',
            'misi' => 'required|string',
        ]);

        $visiMisi = VisiMisi::first();

        if (!$visiMisi) {
            VisiMisi::create([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
        } else {
            $visiMisi->update([
                'visi' => $request->visi,
                'misi' => $request->misi,
            ]);
        }

        return redirect()->back()->with('success', 'Visi & Misi berhasil diperbarui!');
    }
}
