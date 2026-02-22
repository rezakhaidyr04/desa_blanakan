@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm p-8">
            <h1 class="text-2xl font-bold text-slate-900 mb-2">Setelan Akun</h1>
            <p class="text-sm text-slate-500 mb-6">Perbarui data akun Anda di sini.</p>

            @if (session('success'))
                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 text-green-800 px-4 py-3 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('user.settings.update') }}" class="space-y-5" data-loading-form>
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="name">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="email">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="pt-2 border-t border-slate-100"></div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="current_password">Password Saat Ini (opsional)</label>
                    <input id="current_password" name="current_password" type="password"
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('current_password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password">Password Baru (opsional)</label>
                    <input id="password" name="password" type="password"
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                    @error('password')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-700 mb-1" for="password_confirmation">Konfirmasi Password Baru</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        class="w-full rounded-xl border-slate-200 focus:border-teal-500 focus:ring-teal-500" />
                </div>

                <button type="submit" data-loading-submit class="w-full px-5 py-3 bg-teal-600 text-white text-sm font-semibold rounded-xl hover:bg-teal-700 transition-all inline-flex items-center justify-center gap-2">
                    <svg data-loading-spinner class="hidden h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path></svg>
                    <span>Simpan Perubahan</span>
                </button>
            </form>

            @if (auth()->user()?->is_admin)
                <div class="mt-6 text-sm text-slate-600">
                    Anda login sebagai admin. Buka
                    <a href="{{ route('admin.settings.index') }}" class="text-teal-600 hover:text-teal-700 font-medium">Setelan Admin</a>.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
