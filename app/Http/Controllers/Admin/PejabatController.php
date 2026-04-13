<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pejabat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PejabatController extends Controller
{
    public function create()
    {
        return view('admin.pejabat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pangkat_golongan' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'level' => 'required|in:kepala,kabag_keuangan,kabag_rt,kabag_protokol,sub_keuangan,sub_rt,sub_protokol',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('pejabat', 'public');
            $data['foto'] = $path;
        }

        Pejabat::create($data);

        return redirect()->route('admin.profil.index')->with('success', 'Data Pejabat berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pejabat = Pejabat::findOrFail($id);
        return view('admin.pejabat.edit', compact('pejabat'));
    }

    public function update(Request $request, $id)
    {
        $pejabat = Pejabat::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'pangkat_golongan' => 'nullable|string|max:255',
            'nip' => 'nullable|string|max:255',
            'level' => 'required|in:kepala,kabag_keuangan,kabag_rt,kabag_protokol,sub_keuangan,sub_rt,sub_protokol',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            if ($pejabat->foto && Storage::disk('public')->exists($pejabat->foto)) {
                Storage::disk('public')->delete($pejabat->foto);
            }

            $path = $request->file('foto')->store('pejabat', 'public');
            $data['foto'] = $path;
        }

        $pejabat->update($data);

        return redirect()->route('admin.profil.index')->with('success', 'Data Pejabat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pejabat = Pejabat::findOrFail($id);

        if ($pejabat->foto && Storage::disk('public')->exists($pejabat->foto)) {
            Storage::disk('public')->delete($pejabat->foto);
        }

        $pejabat->delete();

        return redirect()->route('admin.profil.index')->with('success', 'Data Pejabat berhasil dihapus!');
    }
}
