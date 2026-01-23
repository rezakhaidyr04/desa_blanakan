@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Daftar Akun</h1>
            <p class="text-sm text-slate-500 mb-6">Buat akun pengguna baru.</p>

            <form method="POST" action="{{ route('register.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password">Password</label>
                    <input id="password" name="password" type="password" required
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password_confirmation">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                </div>

                <button type="submit" class="w-full px-5 py-3 bg-teal-600 text-white text-sm font-semibold rounded-xl hover:bg-teal-700 transition-all">
                    Daftar
                </button>
            </form>

            <p class="text-sm text-slate-600 mt-6">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-teal-600 hover:text-teal-700 font-medium">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection
