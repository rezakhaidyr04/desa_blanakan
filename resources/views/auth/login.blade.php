@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Masuk</h1>
            <p class="text-sm text-slate-500 mb-6">Masuk untuk mengakses fitur pengguna.</p>

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
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

                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="rounded border-slate-300 text-teal-600 focus:ring-teal-500" />
                    Ingat saya
                </label>

                <button type="submit" class="w-full px-5 py-3 bg-teal-600 text-white text-sm font-semibold rounded-xl hover:bg-teal-700 transition-all">
                    Masuk
                </button>
            </form>

            <p class="text-sm text-slate-600 mt-6">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-teal-600 hover:text-teal-700 font-medium">Daftar</a>
            </p>
        </div>
    </div>
</div>
@endsection
