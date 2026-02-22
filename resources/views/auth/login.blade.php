@extends('layouts.auth')

@section('title', 'Masuk')

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

        <div class="flex items-center justify-between" style="margin-bottom:0.25rem;">
            <div>
                <div class="card-title">Masuk</div>
                <div class="card-sub">Selamat datang kembali</div>
            </div>
            <a href="{{ route('home') }}" style="font-size:0.82rem;color:rgba(209,250,229,0.55);text-decoration:none;transition:color 0.2s;"
               onmouseover="this.style.color='#34d399'" onmouseout="this.style.color='rgba(209,250,229,0.55)'">
                &larr; Beranda
            </a>
        </div>

        @if ($errors->any())
        <div class="error-box">Email atau password salah.</div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" style="display:flex;flex-direction:column;gap:1rem;" data-loading-form>
            @csrf

            <div>
                <label class="field-label" for="email">Email</label>
                <input id="email" name="email" type="email"
                    value="{{ old('email') }}" required autofocus
                    placeholder="contoh@email.com" class="login-input" />
                @error('email')<p style="color:#f87171;font-size:0.78rem;margin-top:0.3rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="password">Password</label>
                <input id="password" name="password" type="password" required
                    placeholder="" class="login-input" />
                @error('password')<p style="color:#f87171;font-size:0.78rem;margin-top:0.3rem;">{{ $message }}</p>@enderror
                <div style="text-align:right;margin-top:0.4rem;">
                    <a href="{{ route('password.request') }}" style="font-size:0.8rem;color:rgba(209,250,229,0.55);text-decoration:none;transition:color 0.2s;"
                       onmouseover="this.style.color='#34d399'" onmouseout="this.style.color='rgba(209,250,229,0.55)'">Lupa password?</a>
                </div>
            </div>

            <label class="remember-label">
                <input type="checkbox" name="remember"
                    style="accent-color:#34d399;width:15px;height:15px;border-radius:4px;" />
                Ingat saya
            </label>

            <button type="submit" class="btn-masuk" data-loading-submit>
                <svg data-loading-spinner class="hidden" style="width:1rem;height:1rem;" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span>Masuk</span>
            </button>
        </form>

        <p style="text-align:center;font-size:0.85rem;color:rgba(209,250,229,0.5);margin-top:1.25rem;">
            Belum punya akun?
            <a href="{{ route('register') }}" style="color:#34d399;font-weight:700;text-decoration:none;">Daftar</a>
        </p>
    </div>
</div>

@endsection