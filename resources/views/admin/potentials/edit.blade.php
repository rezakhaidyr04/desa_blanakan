@extends('admin.layouts.app')

@section('title', 'Edit Potensi Desa')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.potentials.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.potentials.update', $potential) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Nama Potensi *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $potential->title) }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Kategori *</label>
                <select id="category" name="category" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <option value="pertanian" {{ $potential->category == 'pertanian' ? 'selected' : '' }}>🌾 Pertanian</option>
                    <option value="perikanan" {{ $potential->category == 'perikanan' ? 'selected' : '' }}>🐟 Perikanan</option>
                    <option value="peternakan" {{ $potential->category == 'peternakan' ? 'selected' : '' }}>🐄 Peternakan</option>
                    <option value="umkm" {{ $potential->category == 'umkm' ? 'selected' : '' }}>🏪 UMKM</option>
                    <option value="wisata" {{ $potential->category == 'wisata' ? 'selected' : '' }}>🏖️ Wisata</option>
                    <option value="kerajinan" {{ $potential->category == 'kerajinan' ? 'selected' : '' }}>🎨 Kerajinan</option>
                    <option value="kuliner" {{ $potential->category == 'kuliner' ? 'selected' : '' }}>🍽️ Kuliner</option>
                    <option value="lainnya" {{ $potential->category == 'lainnya' ? 'selected' : '' }}>📦 Lainnya</option>
                </select>
            </div>

            @if($potential->image)
                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-2">Gambar Saat Ini</label>
                    <img src="{{ asset('storage/' . $potential->image) }}" alt="{{ $potential->title }}" class="w-48 h-32 object-cover rounded-lg">
                </div>
            @endif

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">{{ $potential->image ? 'Ganti Gambar' : 'Upload Gambar' }}</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Deskripsi *</label>
                <textarea id="description" name="description" rows="4" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('description', $potential->description) }}</textarea>
            </div>

            <div>
                <label for="details" class="block text-sm font-medium text-slate-700 mb-2">Detail Tambahan</label>
                <textarea id="details" name="details" rows="4"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('details', $potential->details) }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="location" class="block text-sm font-medium text-slate-700 mb-2">Lokasi</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $potential->location) }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label for="contact" class="block text-sm font-medium text-slate-700 mb-2">Kontak</label>
                    <input type="text" id="contact" name="contact" value="{{ old('contact', $potential->contact) }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>

            <div>
                <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $potential->order) }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ $potential->is_active ? 'checked' : '' }}
                    class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Tampilkan di website</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
                    Update
                </button>
                <a href="{{ route('admin.potentials.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium px-6 py-3 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
