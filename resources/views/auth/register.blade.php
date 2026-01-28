@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="relative isolate">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-teal-50 via-slate-50 to-white"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <!-- Left: info -->
            <div class="hidden lg:block">
                <div class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center shadow-lg shadow-teal-600/20">
                        <span class="text-2xl font-bold">B</span>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-slate-900 tracking-tight">Buat Akun</div>
                        <div class="text-sm text-slate-600">Akses layanan dan setelan akun.</div>
                    </div>
                </div>

                <div class="mt-8 rounded-2xl border border-slate-200 bg-white/70 backdrop-blur p-5">
                    <div class="text-sm font-semibold text-slate-900 mb-2">Yang bisa kamu lakukan:</div>
                    <ul class="text-sm text-slate-600 space-y-2">
                        <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>Daftar & kelola profil</li>
                        <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>Akses setelan akun di halaman <span class="font-medium text-slate-800">/setelan</span></li>
                        <li class="flex gap-2"><span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>Gunakan layanan desa secara online</li>
                    </ul>
                </div>
            </div>

            <!-- Right: form -->
            <div>
                <div class="max-w-md mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl shadow-slate-900/5 ring-1 ring-slate-200 p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-slate-900">Daftar Akun</h1>
                                <p class="text-sm text-slate-500 mt-1">Buat akun pengguna baru.</p>
                            </div>
                            <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-teal-600 transition-colors">Kembali</a>
                        </div>

                        @if ($errors->any())
                            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                                Periksa kembali data yang kamu isi.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register.submit') }}" class="space-y-4 mt-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Nama</label>
                                <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                                    placeholder="Nama lengkap"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                                @error('name')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                    placeholder="contoh@email.com"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                                @error('email')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="password">Password</label>
                                <input id="password" name="password" type="password" required
                                    placeholder="Minimal 8 karakter"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                                @error('password')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="password_confirmation">Konfirmasi Password</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" required
                                    placeholder="Ulangi password"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                            </div>

                            <button type="submit" class="w-full px-5 py-3 bg-teal-600 text-white text-sm font-semibold rounded-2xl hover:bg-teal-700 transition-all shadow-lg shadow-teal-600/20">
                                Daftar
                            </button>
                        </form>

                        <p class="text-sm text-slate-600 mt-6 text-center">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-700 font-semibold">Masuk</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
