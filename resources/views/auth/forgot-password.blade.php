@extends('layouts.auth')

@section('title', 'Lupa Password')

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

        <div class="flex items-center justify-between" style="margin-bottom:1.5rem;">
            <div>
                <div class="card-title">Lupa Password</div>
                <div class="card-sub">Kami kirimkan tautan reset ke email Anda</div>
            </div>
            <a href="{{ route('login') }}" style="font-size:0.82rem;color:rgba(209,250,229,0.55);text-decoration:none;transition:color 0.2s;"
               onmouseover="this.style.color='#34d399'" onmouseout="this.style.color='rgba(209,250,229,0.55)'">
                &larr; Masuk
            </a>
        </div>

        @if(session('status'))
            <div class="success-box">{{ session('status') }}</div>
        @endif

        @if ($errors->any())
            <div class="error-box">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" style="display:flex;flex-direction:column;gap:1rem;">
            @csrf
            <div>
                <label class="field-label" for="email">Alamat Email</label>
                <input id="email" name="email" type="email"
                    value="{{ old('email') }}" required autofocus
                    placeholder="contoh@email.com" class="login-input" />
                @error('email')<p style="color:#f87171;font-size:0.78rem;margin-top:0.3rem;">{{ $message }}</p>@enderror
            </div>

            <button type="submit" class="btn-masuk">Kirim Tautan Reset</button>
        </form>
    </div>
</div>

@endsection