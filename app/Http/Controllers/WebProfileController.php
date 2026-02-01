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
}
