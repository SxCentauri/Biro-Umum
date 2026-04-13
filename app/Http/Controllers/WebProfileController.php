<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\VisiMisi;
use App\Models\Pejabat;
use Illuminate\Http\Request;

class WebProfileController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)
                    ->latest()
                    ->take(3)
                    ->get();

        return view('web-profile.index', compact('posts'));
    }

    public function profil()
    {
        $visiMisi = VisiMisi::first();

        $kepala = Pejabat::where('level', 'kepala')->first();

        $kabagRt = Pejabat::where('level', 'kabag_rt')->first();
        $subRt = Pejabat::where('level', 'sub_rt')->get();

        $kabagKeuangan = Pejabat::where('level', 'kabag_keuangan')->first();
        $subKeuangan = Pejabat::where('level', 'sub_keuangan')->get();

        $kabagProtokol = Pejabat::where('level', 'kabag_protokol')->first();
        $subProtokol = Pejabat::where('level', 'sub_protokol')->get();

        return view('web-profile.profil', compact(
            'visiMisi',
            'kepala',
            'kabagRt', 'subRt',
            'kabagKeuangan', 'subKeuangan',
            'kabagProtokol', 'subProtokol'
        ));
    }

    public function layanan()
    {
        return view('web-profile.layanan');
    }

    public function kontak()
    {
        return view('web-profile.kontak');
    }

    public function agenda()
    {
        $posts = Post::where('is_published', true)
                    ->latest()
                    ->paginate(6);

        return view('web-profile.agenda', compact('posts'));
    }

    public function showAgenda($id)
    {
        $post = Post::findOrFail($id);

        $recent_posts = Post::where('is_published', true)
                            ->where('id', '!=', $id)
                            ->latest()
                            ->take(5)
                            ->get();

        return view('web-profile.agenda-detail', compact('post', 'recent_posts'));
    }
}
