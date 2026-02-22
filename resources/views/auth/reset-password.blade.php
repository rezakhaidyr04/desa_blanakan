@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')
<canvas id="bg-canvas"></canvas>

<div class="auth-wrap">

    {{-- BRAND --}}
    <div class="auth-brand">
        <div class="brand-icon" id="brand-icon">B</div>
        <div class="auth-brand-name">Desa Blanakan</div>
        <div class="auth-brand-sub">Portal layanan &amp; informasi desa</div>
    </div>

    {{-- CARD --}}
    <div class="login-card" id="login-card">

        <div style="margin-bottom:1.5rem;">
            <div class="card-title">Reset Password</div>
            <div class="card-sub">Buat password baru untuk akun Anda</div>
        </div>

        @if ($errors->any())
            <div class="error-box">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" style="display:flex;flex-direction:column;gap:1rem;">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div>
                <label class="field-label" for="email">Email</label>
                <input id="email" name="email" type="email"
                    value="{{ old('email', request('email')) }}" required autofocus readonly
                    class="login-input" style="opacity:0.7;cursor:not-allowed;" />
                @error('email')<p style="color:#f87171;font-size:0.78rem;margin-top:0.3rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="password">Password Baru</label>
                <input id="password" name="password" type="password" required
                    placeholder="Min. 8 karakter" class="login-input" />
                @error('password')<p style="color:#f87171;font-size:0.78rem;margin-top:0.3rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="password_confirmation">Konfirmasi Password</label>
                <input id="password_confirmation" name="password_confirmation" type="password" required
                    placeholder="Ulangi password baru" class="login-input" />
            </div>

            <button type="submit" class="btn-masuk">Simpan Password Baru</button>
        </form>

        <p style="text-align:center;font-size:0.85rem;color:rgba(209,250,229,0.5);margin-top:1.25rem;">
            <a href="{{ route('login') }}" style="color:#34d399;font-weight:700;text-decoration:none;">&larr; Kembali ke halaman masuk</a>
        </p>
    </div>
</div>

@endsection