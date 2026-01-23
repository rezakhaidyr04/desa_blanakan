@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-slate-50 to-teal-50 py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">Lacak Status Pengajuan</h1>
        <p class="text-slate-600">Masukkan NIK Anda untuk melihat status pengajuan layanan</p>
    </div>
</div>

<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('layanan.check-status') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Induk Kependudukan (NIK)</label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required maxlength="16" pattern="[0-9]{16}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="Masukkan 16 digit NIK">
                @error('nik')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full py-3 px-6 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all">
                <svg class="w-5 h-5 inline-block mr-2 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cek Status
            </button>
        </form>

        <div class="mt-8 pt-8 border-t border-slate-200">
            <div class="text-center">
                <p class="text-sm text-slate-600 mb-3">Belum mengajukan layanan?</p>
                <a href="{{ route('layanan') }}" class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Ajukan Layanan Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
