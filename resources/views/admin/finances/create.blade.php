@extends('admin.layouts.app')

@section('title', 'Tambah Data Keuangan')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.finances.index') }}" class="text-sm text-slate-500 hover:text-teal-600 flex items-center gap-1">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8">
        <h2 class="text-xl font-bold text-slate-800 mb-6">Tambah Data Keuangan</h2>
        <form action="{{ route('admin.finances.store') }}" method="POST" class="space-y-5">
            @csrf
            @include('admin.finances._form')
            <div class="flex gap-3 pt-2">
                <button type="submit" class="px-6 py-2.5 bg-teal-600 hover:bg-teal-700 text-white font-medium rounded-lg transition-colors">Simpan</button>
                <a href="{{ route('admin.finances.index') }}" class="px-6 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 font-medium rounded-lg transition-colors">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
