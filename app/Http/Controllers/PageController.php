<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function profil()
    {
        return view('profil');
    }

    public function potensi()
    {
        return view('potensi');
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function berita()
    {
        $featured = \App\Models\Post::latest()->first();
        $posts = \App\Models\Post::latest()->where('id', '!=', $featured?->id)->paginate(9);
        return view('berita', compact('featured', 'posts'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function galeri()
    {
        return view('galeri');
    }
}
