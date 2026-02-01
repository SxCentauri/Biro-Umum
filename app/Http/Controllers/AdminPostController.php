<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'isi'   => 'required',
            'gambar'=> 'nullable|image|max:2048',
            'kategori' => 'required'
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('berita', 'public');
        }

        Post::create([
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul) . '-' . time(),
            'isi'   => $request->isi,
            'kategori' => $request->kategori,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diterbitkan!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $request->validate([
            'judul' => 'required|max:255',
            'isi'   => 'required',
            'gambar'=> 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($post->gambar) Storage::disk('public')->delete($post->gambar);
            $post->gambar = $request->file('gambar')->store('berita', 'public');
        }

        $post->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'kategori' => $request->kategori,
            'gambar' => $request->hasFile('gambar') ? $post->gambar : $post->gambar,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->gambar) Storage::disk('public')->delete($post->gambar);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Berita dihapus!');
    }
}
