<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Autentikasi') - Desa Blanakan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * { box-sizing: border-box; }
        html, body { height:100%; margin:0; padding:0; font-family:'Plus Jakarta Sans', sans-serif; }

        /* Background — lembut, tidak distraktif */
        .auth-bg {
            min-height:100vh;
            background: linear-gradient(150deg, #f5f1f1 0%, #dcfce7 40%, #d1fae5 70%, #ecfdf5 100%);
            display:flex; align-items:center; justify-content:center;
            padding:1.5rem 1rem;
            position:relative; overflow:hidden;
        }
        /* Dekorasi lingkaran subtle di background */
        .auth-bg::before {
            content:''; position:absolute;
            width:520px; height:520px; border-radius:50%;
            background:rgba(37, 33, 33, 0.07);
            top:-120px; right:-100px; pointer-events:none;
        }
        .auth-bg::after {
            content:''; position:absolute;
            width:350px; height:350px; border-radius:50%;
            background:rgba(5,150,105,0.05);
            bottom:-80px; left:-80px; pointer-events:none;
        }

        /* Wrapper */
        .auth-wrap {
            position:relative; z-index:1;
            display:flex; flex-direction:column;
            align-items:center; width:100%; max-width:460px;
            animation: fadeUp 0.5s ease both;
        }
        @keyframes fadeUp {
            from { opacity:0; transform:translateY(18px); }
            to   { opacity:1; transform:translateY(0); }
        }

        /* Brand */
        .auth-brand { display:flex; flex-direction:column; align-items:center; margin-bottom:1.75rem; text-align:center; }
        .brand-icon {
            width:4.5rem; height:4.5rem; border-radius:1.25rem;
            background:linear-gradient(135deg,#059669,#0d9488);
            color:#fff; display:flex; align-items:center; justify-content:center;
            box-shadow:0 8px 28px rgba(5,150,105,0.3);
            margin-bottom:1rem; flex-shrink:0;
            transition: transform 0.2s;
        }
        .brand-icon:hover { transform:scale(1.06); }
        .auth-brand-name { font-size:1.65rem; font-weight:800; color:#065f46; margin-bottom:0.25rem; }
        .auth-brand-sub { font-size:0.95rem; color:#6b7280; }

        /* Card */
        .login-card {
            width:100%;
            background:#ffffff;
            border:1.5px solid #d1fae5;
            border-radius:1.5rem;
            padding:2.5rem 2.25rem;
            box-shadow:0 4px 32px rgba(232, 11, 11, 0.1), 0 1px 4px rgba(0,0,0,0.05);
        }

        .card-title { font-size:1.5rem; font-weight:800; color:#065f46; margin-bottom:0.2rem; }
        .card-sub { font-size:1rem; color:#6b7280; margin-bottom:0; }

        /* Labels — lebih besar untuk lansia */
        .field-label {
            display:block;
            font-size:0.95rem;
            font-weight:600;
            color:#1f2937;
            margin-bottom:0.5rem;
        }

        /* Input — tinggi cukup besar, mudah tap di mobile */
        .login-input {
            width:100%;
            border-radius:0.75rem;
            border:2px solid #d1d5db;
            background:#f9fafb;
            padding:0.85rem 1rem;
            font-size:1rem;
            color:#111827;
            font-family:inherit;
            outline:none;
            transition:border-color 0.2s, box-shadow 0.2s, background 0.2s;
        }
        .login-input::placeholder { color:#9ca3af; }
        .login-input:focus {
            border-color:#059669;
            box-shadow:0 0 0 3px rgba(5,150,105,0.12);
            background:#fff;
        }

        /* Checkbox remember */
        .remember-label {
            display:flex; align-items:center; gap:0.6rem;
            font-size:0.95rem; color:#374151;
            cursor:pointer; user-select:none;
        }

        /* Tombol — besar, mudah dipencet */
        .btn-masuk {
            width:100%;
            padding:1rem;
            background:linear-gradient(135deg,#059669,#0d9488);
            color:#fff;
            font-weight:700;
            font-size:1.05rem;
            border:none;
            border-radius:0.85rem;
            cursor:pointer;
            box-shadow:0 4px 18px rgba(5,150,105,0.35);
            transition:transform 0.15s, box-shadow 0.15s;
            display:flex; align-items:center; justify-content:center; gap:0.5rem;
            font-family:inherit;
        }
        .btn-masuk:hover { transform:translateY(-1px); box-shadow:0 6px 24px rgba(5,150,105,0.45); }
        .btn-masuk:active { transform:translateY(1px); box-shadow:0 2px 8px rgba(5,150,105,0.3); }

        /* Alert */
        .error-box {
            background:#fef2f2;
            border:1.5px solid #fecaca;
            border-radius:0.75rem;
            padding:0.85rem 1rem;
            font-size:0.95rem;
            color:#dc2626;
            margin-bottom:1.25rem;
            display:flex; align-items:center; gap:0.5rem;
        }
        .success-box {
            background:#f0fdf4;
            border:1.5px solid #bbf7d0;
            border-radius:0.75rem;
            padding:0.85rem 1rem;
            font-size:0.95rem;
            color:#15803d;
            margin-bottom:1.25rem;
        }

        /* Input wrapper dengan ikon */
        .input-wrap { position:relative; }
        .input-icon {
            position:absolute; left:0.85rem; top:50%; transform:translateY(-50%);
            color:#9ca3af; pointer-events:none; width:1.1rem; height:1.1rem;
        }
        .login-input-icon { padding-left:2.85rem !important; }
        .pass-toggle {
            position:absolute; right:0.85rem; top:50%; transform:translateY(-50%);
            background:none; border:none; cursor:pointer;
            color:#9ca3af; padding:0; line-height:0; transition:color 0.2s;
        }
        .pass-toggle:hover { color:#059669; }

        /* Divider */
        .auth-divider { display:flex; align-items:center; gap:0.75rem; margin:0.5rem 0; }
        .auth-divider::before,.auth-divider::after { content:''; flex:1; height:1px; background:#e5e7eb; }
        .auth-divider span { font-size:0.85rem; color:#9ca3af; }

        /* Badge fitur */
        .feature-badges { display:flex; gap:0.5rem; justify-content:center; flex-wrap:wrap; margin-top:0.75rem; }
        .feat-badge {
            font-size:0.78rem; padding:0.25rem 0.75rem;
            border-radius:9999px;
            border:1.5px solid #bbf7d0;
            color:#065f46;
            background:#f0fdf4;
            font-weight:500;
        }

        /* Strength bar */
        .pass-strength { display:flex; gap:0.3rem; margin-top:0.45rem; }
        .pass-bar { flex:1; height:4px; border-radius:9999px; background:#e5e7eb; transition:background 0.3s; }

        /* Accent atas card */
        .card-accent {
            height:4px;
            background:linear-gradient(90deg,#059669 0%,#0d9488 50%,#34d399 100%);
            border-radius:1.5rem 1.5rem 0 0;
            margin:-2.5rem -2.25rem 2rem;
        }
    </style>
    @stack('styles')
</head>
<body style="background:#f0fdf4;">

    <x-flash-toasts />

    @yield('content')

    <script>
    function authTogglePass(id, btn) {
        const input = document.getElementById(id);
        if (input.type === 'password') {
            input.type = 'text';
            btn.style.color = '#059669';
        } else {
            input.type = 'password';
            btn.style.color = '';
        }
    }
    function authCheckStrength(val) {
        const bars = ['pb1','pb2','pb3','pb4'].map(id => document.getElementById(id));
        if (!bars[0]) return;
        const colors = ['#ef4444','#f97316','#eab308','#22c55e'];
        let score = 0;
        if (val.length >= 8) score++;
        if (/[A-Z]/.test(val)) score++;
        if (/[0-9]/.test(val)) score++;
        if (/[^A-Za-z0-9]/.test(val)) score++;
        bars.forEach((b, i) => {
            b.style.background = i < score ? colors[score - 1] : '#e5e7eb';
        });
    }
    </script>
    @stack('scripts')

</body>
</html>
