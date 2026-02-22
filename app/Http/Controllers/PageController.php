<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Gallery;
use App\Models\Service;
use App\Models\Potential;
use App\Models\Official;
use App\Models\Setting;
use App\Models\Finance;

class PageController extends Controller
{
    private function getSettings()
    {
        return Setting::all()->pluck('value', 'key');
    }

    public function home()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $settings = $this->getSettings();
        return view('home', compact('sliders', 'settings'));
    }

    public function profil()
    {
        $settings = $this->getSettings();
        $officials = Official::where('is_active', true)->orderBy('order')->get();
        return view('profil', compact('settings', 'officials'));
    }

    public function potensi()
    {
        $potentials = Potential::where('is_active', true)->orderBy('order')->get();
        $categories = [
            'pertanian' => '🌾 Pertanian',
            'perikanan' => '🐟 Perikanan',
            'umkm'      => '🏪 UMKM',
            'wisata'    => '🏖️ Wisata',
            'kerajinan' => '🎨 Kerajinan',
            'lainnya'   => '📦 Lainnya',
        ];
        return view('potensi', compact('potentials', 'categories'));
    }

    public function layanan()
    {
        $services = Service::where('is_active', true)->orderBy('order')->get();
        return view('layanan', compact('services'));
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
        $settings = $this->getSettings();
        return view('kontak', compact('settings'));
    }

    public function galeri()
    {
        $query = Gallery::where('is_active', true)->orderByDesc('created_at');
        if (request('category')) {
            $query->where('category', request('category'));
        }
        $galleries = $query->paginate(12);
        $categories = [
            'umum'         => 'Umum',
            'kegiatan'     => 'Kegiatan',
            'pembangunan'  => 'Pembangunan',
            'wisata'       => 'Wisata',
        ];
        return view('galeri', compact('galleries', 'categories'));
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

    public function keuangan(Request $request)
    {
        $availableYears = Finance::active()->distinct()->orderByDesc('year')->pluck('year');
        $year = $request->get('year', $availableYears->first() ?? date('Y'));

        $rawData    = Finance::active()->where('year', $year)->orderBy('order')->get();
        $pendapatan = $rawData->where('type', 'pendapatan');
        $belanja    = $rawData->where('type', 'belanja');
        $pembiayaan = $rawData->where('type', 'pembiayaan');

        $totalPendapatan = $pendapatan->sum('budget');
        $totalBelanja    = $belanja->sum('budget');
        $realPendapatan  = $pendapatan->whereNotNull('realization')->sum('realization');
        $realBelanja     = $belanja->whereNotNull('realization')->sum('realization');

        // Group by category for detail display
        $pendapatanGrouped = $pendapatan->groupBy('category');
        $belanjaGrouped    = $belanja->groupBy('category');
        $pembiayaanGrouped = $pembiayaan->groupBy('category');

        return view('keuangan', compact(
            'pendapatanGrouped', 'belanjaGrouped', 'pembiayaanGrouped',
            'totalPendapatan', 'totalBelanja', 'realPendapatan', 'realBelanja',
            'year', 'availableYears'
        ));
    }
}

