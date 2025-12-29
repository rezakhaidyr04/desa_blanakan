@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.galleries.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali ke Galeri
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Judul Foto *</label>
                <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Kategori *</label>
                <select id="category" name="category" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <option value="umum" {{ old('category', $gallery->category) == 'umum' ? 'selected' : '' }}>Umum</option>
                    <option value="kegiatan" {{ old('category', $gallery->category) == 'kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="pembangunan" {{ old('category', $gallery->category) == 'pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                    <option value="wisata" {{ old('category', $gallery->category) == 'wisata' ? 'selected' : '' }}>Wisata</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-2">Foto Saat Ini</label>
                <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" class="w-48 h-32 object-cover rounded-lg mb-2">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Ganti Foto</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                <p class="mt-1 text-sm text-slate-500">Kosongkan jika tidak ingin mengganti foto.</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Keterangan</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('description', $gallery->description) }}</textarea>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ $gallery->is_active ? 'checked' : '' }}
                    class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Tampilkan di website</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
                    Update Foto
                </button>
                <a href="{{ route('admin.galleries.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium px-6 py-3 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
