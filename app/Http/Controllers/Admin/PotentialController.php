<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PotentialController extends Controller
{
    public function index()
    {
        $potentials = Potential::orderBy('order')->paginate(10);
        return view('admin.potentials.index', compact('potentials'));
    }

    public function create()
    {
        return view('admin.potentials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'category', 'description', 'details', 'location', 'contact', 'order']);
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');
        $data['order'] = $data['order'] ?? 0;

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        Potential::create($data);

        return redirect()->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil ditambahkan!');
    }

    public function edit(Potential $potential)
    {
        return view('admin.potentials.edit', compact('potential'));
    }

    public function update(Request $request, Potential $potential)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = $request->only(['title', 'category', 'description', 'details', 'location', 'contact', 'order']);
        $data['slug'] = Str::slug($request->title);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($potential->image) {
                Storage::disk('public')->delete($potential->image);
            }
            $data['image'] = $request->file('image')->store('potentials', 'public');
        }

        $potential->update($data);

        return redirect()->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil diperbarui!');
    }

    public function destroy(Potential $potential)
    {
        if ($potential->image) {
            Storage::disk('public')->delete($potential->image);
        }
        $potential->delete();

        return redirect()->route('admin.potentials.index')
            ->with('success', 'Potensi desa berhasil dihapus!');
    }
}
