@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')
<form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- General Settings -->
    <div class="bg-white rounded-xl shadow-sm mb-6">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">Informasi Umum</h3>
            <p class="text-sm text-slate-500">Pengaturan dasar website</p>
        </div>
        <div class="p-6 space-y-6">
            @foreach($settings->get('general', collect()) as $setting)
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-slate-700 mb-2">{{ $setting->label ?? ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                    @if($setting->type == 'textarea')
                        <textarea id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" rows="3"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ $setting->value }}</textarea>
                    @elseif($setting->type == 'image')
                        @if($setting->value)
                            <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->key }}" class="w-32 h-32 object-contain mb-2">
                        @endif
                        <input type="file" id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" accept="image/*"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    @elseif($setting->type == 'boolean')
                        <label class="flex items-center">
                            <input type="checkbox" name="settings[{{ $setting->key }}]" value="1" {{ $setting->value ? 'checked' : '' }}
                                class="w-4 h-4 text-teal-600 border-slate-300 rounded focus:ring-teal-500">
                            <span class="ml-2 text-sm text-slate-700">Aktif</span>
                        </label>
                    @else
                        <input type="text" id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Contact Settings -->
    <div class="bg-white rounded-xl shadow-sm mb-6">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">Informasi Kontak</h3>
            <p class="text-sm text-slate-500">Alamat dan kontak desa</p>
        </div>
        <div class="p-6 space-y-6">
            @foreach($settings->get('contact', collect()) as $setting)
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-slate-700 mb-2">{{ $setting->label ?? ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                    @if($setting->type == 'textarea')
                        <textarea id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" rows="3"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">{{ $setting->value }}</textarea>
                    @else
                        <input type="text" id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}"
                            class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500">
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    <!-- Social Media Settings -->
    <div class="bg-white rounded-xl shadow-sm mb-6">
        <div class="p-6 border-b border-slate-200">
            <h3 class="text-lg font-semibold text-slate-800">Media Sosial</h3>
            <p class="text-sm text-slate-500">Link akun media sosial desa</p>
        </div>
        <div class="p-6 space-y-6">
            @foreach($settings->get('social', collect()) as $setting)
                <div>
                    <label for="{{ $setting->key }}" class="block text-sm font-medium text-slate-700 mb-2">{{ $setting->label ?? ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                    <input type="text" id="{{ $setting->key }}" name="settings[{{ $setting->key }}]" value="{{ $setting->value }}"
                        class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-teal-500 focus:border-teal-500"
                        placeholder="https://...">
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-white font-medium px-6 py-3 rounded-lg">
            Simpan Pengaturan
        </button>
    </div>
</form>
@endsection
