@extends('layouts.auth')

@section('title', 'Masuk')

@section('content')
<div class="relative isolate">
    <div class="absolute inset-0 -z-10 bg-gradient-to-b from-teal-50 via-slate-50 to-white"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16">
        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <!-- Left: brand / info -->
            <div class="hidden lg:block">
                <div class="inline-flex items-center gap-3">
                    <div class="w-12 h-12 rounded-2xl bg-teal-600 text-white flex items-center justify-center shadow-lg shadow-teal-600/20">
                        <span class="text-2xl font-bold">B</span>
                    </div>
                    <div>
                        <div class="text-2xl font-extrabold text-slate-900 tracking-tight">Desa Blanakan</div>
                        <div class="text-sm text-slate-600">Portal layanan & informasi desa</div>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <div class="text-sm text-slate-700">
                        Satu halaman login untuk <span class="font-semibold">admin</span> dan <span class="font-semibold">pengguna</span>.
                    </div>
                    <div class="rounded-2xl border border-slate-200 bg-white/70 backdrop-blur p-5">
                        <div class="text-sm font-semibold text-slate-900 mb-2">Setelah login:</div>
                        <ul class="text-sm text-slate-600 space-y-2">
                            <li class="flex gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                                Admin langsung ke <span class="font-medium text-slate-800">Setelan Admin</span>
                            </li>
                            <li class="flex gap-2">
                                <span class="mt-1 h-2 w-2 rounded-full bg-teal-500"></span>
                                User langsung ke <span class="font-medium text-slate-800">Setelan Akun</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Right: form -->
            <div>
                <div class="max-w-md mx-auto">
                    <div class="bg-white rounded-3xl shadow-xl shadow-slate-900/5 ring-1 ring-slate-200 p-8">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-slate-900">Masuk</h1>
                                <p class="text-sm text-slate-500 mt-1">Masuk untuk mengakses setelan akun.</p>
                            </div>
                            <a href="{{ route('home') }}" class="text-sm text-slate-500 hover:text-teal-600 transition-colors">Kembali</a>
                        </div>

                        @if ($errors->any())
                            <div class="mt-6 rounded-2xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                                Email atau password salah.
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login.submit') }}" class="space-y-4 mt-6">
                            @csrf

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                                <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                                    placeholder="contoh@email.com"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                                @error('email')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1" for="password">Password</label>
                                <input id="password" name="password" type="password" required
                                    placeholder="••••••••"
                                    class="w-full rounded-2xl border-slate-200 bg-slate-50/60 px-4 py-3 focus:border-teal-500 focus:ring-teal-500" />
                                @error('password')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-between">
                                <label class="flex items-center gap-2 text-sm text-slate-600">
                                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500" />
                                    Ingat saya
                                </label>
                                <span class="text-xs text-slate-500">Admin & user pakai form yang sama</span>
                            </div>

                            <button type="submit" class="w-full px-5 py-3 bg-teal-600 text-white text-sm font-semibold rounded-2xl hover:bg-teal-700 transition-all shadow-lg shadow-teal-600/20">
                                Masuk
                            </button>
                        </form>

                        <p class="text-sm text-slate-600 mt-6 text-center">
                            Belum punya akun?
                            <a href="{{ route('register') }}" class="text-teal-600 hover:text-teal-700 font-semibold">Daftar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
