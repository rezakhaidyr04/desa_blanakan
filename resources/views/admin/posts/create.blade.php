@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-4xl">
    <div class="mb-6">
        <a href="{{ route('admin.posts.index') }}" class="text-slate-600 hover:text-slate-800 flex items-center gap-2 text-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar Berita
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">Tambah Berita Baru</h3>
            <p class="text-sm text-slate-500">Isi form berikut untuk menambahkan berita baru</p>
        </div>

        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Judul Berita <span class="text-red-500">*</span></label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('title') border-red-500 @enderror"
                    placeholder="Masukkan judul berita">
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-slate-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                <select id="category" name="category" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('category') border-red-500 @enderror">
                    <option value="">Pilih Kategori</option>
                    <option value="Pengumuman" {{ old('category') == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                    <option value="Kegiatan" {{ old('category') == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                    <option value="Pembangunan" {{ old('category') == 'Pembangunan' ? 'selected' : '' }}>Pembangunan</option>
                    <option value="Sosial" {{ old('category') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                    <option value="Kesehatan" {{ old('category') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                    <option value="Pendidikan" {{ old('category') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                </select>
                @error('category')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="excerpt" class="block text-sm font-medium text-slate-700 mb-2">Ringkasan <span class="text-red-500">*</span></label>
                <textarea id="excerpt" name="excerpt" rows="3" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('excerpt') border-red-500 @enderror"
                    placeholder="Ringkasan singkat berita (maksimal 500 karakter)">{{ old('excerpt') }}</textarea>
                @error('excerpt')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="body" class="block text-sm font-medium text-slate-700 mb-2">Isi Berita <span class="text-red-500">*</span></label>
                <textarea id="body" name="body" rows="10" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('body') border-red-500 @enderror"
                    placeholder="Tulis isi berita lengkap di sini...">{{ old('body') }}</textarea>
                @error('body')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Gambar</label>
                <input type="file" id="image" name="image" accept="image/*"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500 @error('image') border-red-500 @enderror">
                <p class="mt-1 text-sm text-slate-500">Format: JPG, PNG, GIF. Maksimal 2MB</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-slate-200">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Simpan Berita
                </button>
                <a href="{{ route('admin.posts.index') }}" class="text-slate-600 hover:text-slate-800 font-medium px-6 py-3">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
