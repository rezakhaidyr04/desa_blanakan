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

    public function beritaDetail($slug)
    {
        $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
        $relatedPosts = \App\Models\Post::where('id', '!=', $post->id)
            ->where('category', $post->category)
            ->latest()
            ->take(3)
            ->get();
        return view('berita-detail', compact('post', 'relatedPosts'));
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function prosedurIndex()
    {
        return view('prosedur-index');
    }

    public function prosedurEktp()
    {
        return view('prosedur-ektp');
    }

    public function prosedurKk()
    {
        return view('prosedur-kk');
    }

    public function prosedurAkta()
    {
        return view('prosedur-akta');
    }

    public function prosedurSkck()
    {
        return view('prosedur-skck');
    }
}
