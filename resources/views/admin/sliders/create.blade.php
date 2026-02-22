@extends('admin.layouts.app')

@section('title', 'Tambah Slider')

@section('content')
<div class="max-w-2xl">
    <a href="{{ route('admin.sliders.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <div>
                <label for="title" class="block text-sm font-medium text-slate-700 mb-2">Judul *</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Selamat Datang di Desa Blanakan">
            </div>

            <div>
                <label for="subtitle" class="block text-sm font-medium text-slate-700 mb-2">Sub Judul</label>
                <input type="text" id="subtitle" name="subtitle" value="{{ old('subtitle') }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                    placeholder="Desa yang asri dan sejahtera">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-slate-700 mb-2">Gambar Slider *</label>
                <input type="file" id="image" name="image" accept="image/*" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                <p class="mt-1 text-sm text-slate-500">Ukuran disarankan: 1920x600 pixel. Maksimal 3MB.</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="button_text" class="block text-sm font-medium text-slate-700 mb-2">Teks Tombol</label>
                    <input type="text" id="button_text" name="button_text" value="{{ old('button_text') }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        placeholder="Selengkapnya">
                </div>
                <div>
                    <label for="button_link" class="block text-sm font-medium text-slate-700 mb-2">Link Tombol</label>
                    <input type="text" id="button_link" name="button_link" value="{{ old('button_link') }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        placeholder="/profil">
                </div>
            </div>

            <div>
                <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Urutan</label>
                <input type="number" id="order" name="order" value="{{ old('order', 0) }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                <p class="mt-1 text-sm text-slate-500">Angka kecil tampil lebih dulu</p>
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" checked
                    class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Aktifkan slider</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
                    Simpan Slider
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium px-6 py-3 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
