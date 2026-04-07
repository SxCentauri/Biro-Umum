<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view('web-profile.profil');
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
