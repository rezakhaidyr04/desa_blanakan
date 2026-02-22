@extends('admin.layouts.app')

@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-3xl">
    <a href="{{ route('admin.services.index') }}" class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-800 mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        Kembali
    </a>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Layanan *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $service->name) }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
            </div>

            <div>
                <label for="icon" class="block text-sm font-medium text-slate-700 mb-2">Icon *</label>
                <select id="icon" name="icon" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    <option value="document" {{ $service->icon == 'document' ? 'selected' : '' }}>📄 Dokumen</option>
                    <option value="id-card" {{ $service->icon == 'id-card' ? 'selected' : '' }}>🪪 KTP/Identitas</option>
                    <option value="family" {{ $service->icon == 'family' ? 'selected' : '' }}>👨‍👩‍👧‍👦 Keluarga</option>
                    <option value="certificate" {{ $service->icon == 'certificate' ? 'selected' : '' }}>📜 Sertifikat</option>
                    <option value="letter" {{ $service->icon == 'letter' ? 'selected' : '' }}>✉️ Surat</option>
                    <option value="building" {{ $service->icon == 'building' ? 'selected' : '' }}>🏛️ Pemerintahan</option>
                    <option value="health" {{ $service->icon == 'health' ? 'selected' : '' }}>🏥 Kesehatan</option>
                    <option value="education" {{ $service->icon == 'education' ? 'selected' : '' }}>🎓 Pendidikan</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-slate-700 mb-2">Deskripsi Layanan</label>
                <textarea id="description" name="description" rows="3"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label for="requirements" class="block text-sm font-medium text-slate-700 mb-2">Persyaratan</label>
                <textarea id="requirements" name="requirements" rows="5"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('requirements', $service->requirements) }}</textarea>
                <p class="mt-1 text-sm text-slate-500">Tulis satu persyaratan per baris</p>
            </div>

            <div>
                <label for="procedures" class="block text-sm font-medium text-slate-700 mb-2">Prosedur/Langkah</label>
                <textarea id="procedures" name="procedures" rows="5"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ old('procedures', $service->procedures) }}</textarea>
                <p class="mt-1 text-sm text-slate-500">Tulis satu langkah per baris</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="processing_time" class="block text-sm font-medium text-slate-700 mb-2">Waktu Proses</label>
                    <input type="text" id="processing_time" name="processing_time" value="{{ old('processing_time', $service->processing_time) }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
                <div>
                    <label for="cost" class="block text-sm font-medium text-slate-700 mb-2">Biaya</label>
                    <input type="text" id="cost" name="cost" value="{{ old('cost', $service->cost) }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                </div>
            </div>

            <div>
                <label for="order" class="block text-sm font-medium text-slate-700 mb-2">Urutan Tampil</label>
                <input type="number" id="order" name="order" value="{{ old('order', $service->order) }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
            </div>

            <div class="flex items-center">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ $service->is_active ? 'checked' : '' }}
                    class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500">
                <label for="is_active" class="ml-2 text-sm text-slate-700">Tampilkan di website</label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
                    Update Layanan
                </button>
                <a href="{{ route('admin.services.index') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-medium px-6 py-3 rounded-lg">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
