<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = trim((string) $request->query('q', ''));

        if ($query === '' || mb_strlen($query) < 2) {
            return response()->json([
                'query' => $query,
                'results' => [],
            ]);
        }

        $limitPerType = 5;
        $results = [];

        $posts = Post::query()
            ->where('title', 'like', "%{$query}%")
            ->orWhere('excerpt', 'like', "%{$query}%")
            ->orderByDesc('published_at')
            ->orderByDesc('id')
            ->limit($limitPerType)
            ->get(['title', 'slug']);

        foreach ($posts as $post) {
            $results[] = [
                'type' => 'Berita',
                'title' => $post->title,
                'url' => route('berita.detail', $post->slug),
                'subtitle' => '/berita/' . $post->slug,
            ];
        }

        $services = Service::query()
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderBy('order')
            ->orderByDesc('id')
            ->limit($limitPerType)
            ->get(['name', 'slug']);

        foreach ($services as $service) {
            $results[] = [
                'type' => 'Layanan',
                'title' => $service->name,
                'url' => route('layanan'),
                'subtitle' => 'Layanan: ' . $service->slug,
            ];
        }

        $galleries = Gallery::query()
            ->where('is_active', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->orderByDesc('id')
            ->limit($limitPerType)
            ->get(['title']);

        foreach ($galleries as $gallery) {
            $results[] = [
                'type' => 'Galeri',
                'title' => $gallery->title,
                'url' => route('galeri'),
                'subtitle' => '/galeri',
            ];
        }

        return response()->json([
            'query' => $query,
            'results' => $results,
        ]);
    }
}
