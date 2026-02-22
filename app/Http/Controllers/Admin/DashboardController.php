<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Models\Gallery;
use App\Models\Message;
use App\Models\Official;
use App\Models\Potential;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::count(),
            'total_galleries' => Gallery::count(),
            'total_officials' => Official::count(),
            'total_services' => Service::count(),
            'total_potentials' => Potential::count(),
            'total_sliders' => Slider::count(),
            'unread_messages' => Message::unread()->count(),
            'total_messages' => Message::count(),
            'recent_posts' => Post::latest()->take(5)->get(),
            'recent_messages' => Message::latest()->take(5)->get(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}
