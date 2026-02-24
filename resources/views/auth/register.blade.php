@extends('layouts.auth')

@section('title', 'Daftar')

@section('content')
<div class="auth-bg">
<div class="auth-wrap">

    {{-- BRAND --}}
    <div class="auth-brand">
        <div class="brand-icon">
            <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="width:2.1rem;height:2.1rem;">
                <path d="M20 5L4 17V35H16V26H24V35H36V17L20 5Z" fill="#fff" fill-opacity="0.95"/>
                <rect x="16" y="26" width="8" height="9" rx="1" fill="#065f46" fill-opacity="0.5"/>
                <circle cx="20" cy="14" r="2.5" fill="#fbbf24"/>
            </svg>
        </div>
        <div class="auth-brand-name">Desa Blanakan</div>
        <div class="auth-brand-sub">Portal layanan &amp; informasi desa</div>
        <div class="feature-badges">
            <span class="feat-badge">&#128203; Layanan Online</span>
            <span class="feat-badge">&#128196; Pengajuan Surat</span>
            <span class="feat-badge">&#127806; Info Desa</span>
        </div>
    </div>

    {{-- CARD --}}
    <div class="login-card">
        <div class="card-accent"></div>

        <div class="flex items-center justify-between" style="margin-bottom:1.25rem;">
            <div>
                <div class="card-title">Daftar</div>
                <div class="card-sub">Buat akun warga baru</div>
            </div>
            <a href="{{ route('home') }}" style="font-size:0.9rem;color:#6b7280;text-decoration:none;font-weight:500;transition:color 0.2s;"
               onmouseover="this.style.color='#059669'" onmouseout="this.style.color='#6b7280'">
                &larr; Beranda
            </a>
        </div>

        @if ($errors->any())
        <div class="error-box">
            <svg style="width:1rem;height:1rem;flex-shrink:0;" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
            Periksa kembali data yang kamu isi.
        </div>
        @endif

        <form method="POST" action="{{ route('register.submit') }}" style="display:flex;flex-direction:column;gap:1.25rem;" data-loading-form>
            @csrf

            <div>
                <label class="field-label" for="name">Nama Lengkap</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                    </svg>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
                        placeholder="Nama sesuai KTP" class="login-input login-input-icon" />
                </div>
                @error('name')<p style="color:#dc2626;font-size:0.875rem;margin-top:0.35rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="email">Alamat Email</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                    </svg>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        placeholder="contoh@email.com" class="login-input login-input-icon" />
                </div>
                @error('email')<p style="color:#dc2626;font-size:0.875rem;margin-top:0.35rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="reg-password">Password</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                    </svg>
                    <input id="reg-password" name="password" type="password" required
                        placeholder="Minimal 8 karakter" class="login-input login-input-icon" style="padding-right:3rem;"
                        oninput="authCheckStrength(this.value)" />
                    <button type="button" class="pass-toggle" onclick="authTogglePass('reg-password', this)" tabindex="-1" title="Lihat/sembunyikan password">
                        <svg viewBox="0 0 20 20" fill="currentColor" style="width:1.1rem;height:1.1rem;"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                    </button>
                </div>
                <div class="pass-strength" style="margin-top:0.5rem;">
                    <div class="pass-bar" id="pb1"></div>
                    <div class="pass-bar" id="pb2"></div>
                    <div class="pass-bar" id="pb3"></div>
                    <div class="pass-bar" id="pb4"></div>
                </div>
                <p style="font-size:0.8rem;color:#6b7280;margin-top:0.3rem;">Gunakan huruf besar, angka, dan simbol agar lebih aman.</p>
                @error('password')<p style="color:#dc2626;font-size:0.875rem;margin-top:0.35rem;">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="field-label" for="password_confirmation">Ulangi Password</label>
                <div class="input-wrap">
                    <svg class="input-icon" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        placeholder="Ketik ulang password" class="login-input login-input-icon" style="padding-right:3rem;" />
                    <button type="button" class="pass-toggle" onclick="authTogglePass('password_confirmation', this)" tabindex="-1" title="Lihat/sembunyikan password">
                        <svg viewBox="0 0 20 20" fill="currentColor" style="width:1.1rem;height:1.1rem;"><path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/><path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn-masuk" data-loading-submit>
                <svg data-loading-spinner class="hidden" style="width:1.1rem;height:1.1rem;" viewBox="0 0 24 24" fill="none">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                </svg>
                <span>Buat Akun</span>
            </button>
        </form>

        <div class="auth-divider" style="margin-top:1.5rem;"><span>sudah punya akun?</span></div>

        <a href="{{ route('login') }}" style="display:block;text-align:center;margin-top:1rem;padding:0.85rem;border:2px solid #059669;border-radius:0.85rem;color:#059669;font-weight:700;font-size:1rem;text-decoration:none;transition:background 0.2s,color 0.2s;"
           onmouseover="this.style.background='#059669';this.style.color='#fff';"
           onmouseout="this.style.background='';this.style.color='#059669';">
            &larr; Masuk Sekarang
        </a>
    </div>
</div>
</div>
@endsection