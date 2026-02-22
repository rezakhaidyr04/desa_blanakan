<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Autentikasi') - Desa Blanakan</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Inter', sans-serif; }
        html,body { height:100%; margin:0; padding:0; }

        /* Canvas background */
        #bg-canvas { position:fixed; inset:0; width:100%; height:100%; z-index:0; }

        /* Wrapper */
        .auth-wrap {
            position:relative; z-index:1; min-height:100vh;
            display:flex; flex-direction:column;
            align-items:center; justify-content:center;
            padding:2rem 1rem;
        }

        /* Brand above card */
        .auth-brand { display:flex; flex-direction:column; align-items:center; margin-bottom:1.5rem; text-align:center; }
        .auth-brand-name { font-size:1.5rem; font-weight:900; color:#fff; letter-spacing:-0.01em; text-shadow:0 2px 10px rgba(0,0,0,0.4); margin-bottom:0.2rem; }
        .auth-brand-sub { font-size:0.85rem; color:rgba(110,231,183,0.8); }
        .brand-icon {
            width:3.75rem; height:3.75rem; border-radius:1.1rem;
            background:linear-gradient(135deg,#d97706,#065f46);
            color:#fff; display:flex; align-items:center; justify-content:center;
            font-size:1.9rem; font-weight:900;
            box-shadow:0 6px 24px rgba(5,150,105,0.45);
            cursor:pointer; transition:transform 0.2s;
            margin-bottom:1.25rem; flex-shrink:0;
        }
        .brand-icon:hover { transform:scale(1.08) rotate(-4deg); }
        .brand-icon:active { transform:scale(0.9); }

        /* Card */
        .login-card {
            width:100%; max-width:420px;
            background:rgba(255,255,255,0.06);
            border:1px solid rgba(255,255,255,0.13);
            border-radius:1.75rem; padding:2.25rem 2rem;
            box-shadow:0 24px 60px rgba(0,0,0,0.4);
            backdrop-filter:blur(20px); -webkit-backdrop-filter:blur(20px);
            transition:transform 0.15s ease, box-shadow 0.15s ease;
            transform-style:preserve-3d;
        }
        .card-title { font-size:1.6rem; font-weight:800; color:#fff; margin-bottom:0.3rem; }
        .card-sub { font-size:0.85rem; color:rgba(209,250,229,0.65); margin-bottom:1.5rem; }

        /* Form elements */
        .field-label { display:block; font-size:0.8rem; font-weight:600; color:rgba(209,250,229,0.75); margin-bottom:0.4rem; letter-spacing:0.04em; text-transform:uppercase; }
        .login-input { width:100%; border-radius:0.85rem; border:1.5px solid rgba(255,255,255,0.12); background:rgba(255,255,255,0.07); padding:0.75rem 1rem; font-size:0.9rem; color:#fff; outline:none; transition:border-color 0.2s,box-shadow 0.2s,background 0.2s; box-sizing:border-box; }
        .login-input::placeholder { color:rgba(255,255,255,0.3); }
        .login-input:focus { border-color:#34d399; box-shadow:0 0 0 3px rgba(52,211,153,0.18); background:rgba(255,255,255,0.12); }
        .remember-label { display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; color:rgba(209,250,229,0.65); cursor:pointer; user-select:none; }

        /* Button */
        .btn-masuk { width:100%; padding:0.85rem; background:linear-gradient(135deg,#059669,#0d9488); color:#fff; font-weight:700; font-size:0.95rem; border:none; border-radius:0.85rem; cursor:pointer; box-shadow:0 4px 20px rgba(5,150,105,0.5); transition:transform 0.15s,box-shadow 0.15s,filter 0.15s; display:flex; align-items:center; justify-content:center; gap:0.5rem; letter-spacing:0.01em; }
        .btn-masuk:hover { transform:translateY(-2px); box-shadow:0 8px 28px rgba(5,150,105,0.65); filter:brightness(1.05); }
        .btn-masuk:active { transform:translateY(1px); box-shadow:0 2px 8px rgba(5,150,105,0.35); }

        /* Alert boxes */
        .error-box { background:rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.3); border-radius:0.85rem; padding:0.7rem 1rem; font-size:0.85rem; color:#fca5a5; margin-bottom:1rem; }
        .success-box { background:rgba(16,185,129,0.15); border:1px solid rgba(52,211,153,0.3); border-radius:0.85rem; padding:0.9rem 1rem; color:#6ee7b7; font-size:0.85rem; margin-bottom:1rem; }

        /* Effects */
        .ripple-dot { position:fixed; border-radius:50%; background:rgba(52,211,153,0.2); pointer-events:none; transform:scale(0); animation:ripOut 0.8s ease-out forwards; z-index:9999; }
        @keyframes ripOut { to { transform:scale(8); opacity:0; } }
        .sparkle { position:fixed; pointer-events:none; font-size:1.1rem; animation:spkPop 0.8s ease-out forwards; z-index:9999; }
        @keyframes spkPop { 0%{opacity:1;transform:scale(0.4) translateY(0);} 60%{opacity:1;transform:scale(1.3) translateY(-34px);} 100%{opacity:0;transform:scale(0.7) translateY(-64px);} }
    </style>
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen">

    <x-flash-toasts />

    @yield('content')

    {{-- Shared firefly animation for all auth pages --}}
    <script>
    (function(){
        const canvas = document.getElementById('bg-canvas');
        if(!canvas) return;
        const ctx = canvas.getContext('2d');
        let W, H, flies;
        const PALETTE = [
            'rgba(52,211,153,','rgba(16,185,129,','rgba(6,95,70,',
            'rgba(251,191,36,','rgba(110,231,183,',
        ];
        function resize(){ W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }
        function rand(a,b){ return Math.random()*(b-a)+a; }
        function init(){
            flies = [];
            const N = Math.min(80, Math.floor(W*H/14000));
            for(let i=0;i<N;i++){
                flies.push({x:rand(0,W),y:rand(0,H),vx:rand(-0.35,0.35),vy:rand(-0.35,0.35),r:rand(2,9),glow:rand(8,28),color:PALETTE[Math.floor(rand(0,PALETTE.length))],op:rand(0.25,0.75),twinkleSpeed:rand(0.005,0.02),twinklePhase:rand(0,Math.PI*2)});
            }
        }
        function drawBg(){
            const g = ctx.createLinearGradient(0,0,W,H);
            g.addColorStop(0,'#022c22'); g.addColorStop(0.5,'#042f2e'); g.addColorStop(1,'#011e1a');
            ctx.fillStyle=g; ctx.fillRect(0,0,W,H);
            const s = ctx.createLinearGradient(0,0,W*0.6,H*0.5);
            s.addColorStop(0,'rgba(52,211,153,0.04)'); s.addColorStop(1,'rgba(0,0,0,0)');
            ctx.fillStyle=s; ctx.fillRect(0,0,W,H);
        }
        function drawFlies(){
            flies.forEach(f=>{
                f.twinklePhase += f.twinkleSpeed;
                const op = f.op * (0.55 + 0.45*Math.sin(f.twinklePhase));
                const g = ctx.createRadialGradient(f.x,f.y,0,f.x,f.y,f.glow);
                g.addColorStop(0,f.color+op*0.9+')'); g.addColorStop(1,f.color+'0)');
                ctx.beginPath(); ctx.arc(f.x,f.y,f.glow,0,Math.PI*2); ctx.fillStyle=g; ctx.fill();
                ctx.beginPath(); ctx.arc(f.x,f.y,f.r*0.45,0,Math.PI*2); ctx.fillStyle=f.color+Math.min(op*1.5,1)+')'; ctx.fill();
                f.x+=f.vx; f.y+=f.vy;
                if(f.x<-f.glow)f.x=W+f.glow; if(f.x>W+f.glow)f.x=-f.glow;
                if(f.y<-f.glow)f.y=H+f.glow; if(f.y>H+f.glow)f.y=-f.glow;
            });
        }
        function loop(){ ctx.clearRect(0,0,W,H); drawBg(); drawFlies(); requestAnimationFrame(loop); }
        window.addEventListener('click',e=>{
            for(let k=0;k<6;k++){
                const angle=rand(0,Math.PI*2),speed=rand(0.8,2.5);
                const f={x:e.clientX,y:e.clientY,vx:Math.cos(angle)*speed,vy:Math.sin(angle)*speed,r:rand(3,8),glow:rand(12,30),color:PALETTE[Math.floor(rand(0,PALETTE.length))],op:0.9,twinkleSpeed:rand(0.02,0.06),twinklePhase:0};
                flies.push(f); setTimeout(()=>{const i=flies.indexOf(f);if(i>-1)flies.splice(i,1);},2500);
            }
            spawnRipple(e.clientX,e.clientY);
        });
        window.addEventListener('resize',()=>{resize();init();});
        resize(); init(); requestAnimationFrame(loop);

        /* 3-D card tilt */
        const card = document.getElementById('login-card');
        if(card){
            card.addEventListener('mousemove',function(e){
                const r=card.getBoundingClientRect();
                const rx=-(e.clientY-r.top-r.height/2)/r.height*9;
                const ry=(e.clientX-r.left-r.width/2)/r.width*9;
                card.style.transform='perspective(900px) rotateX('+rx+'deg) rotateY('+ry+'deg)';
                card.style.boxShadow=(-ry*3)+'px '+(rx*3)+'px 55px rgba(5,150,105,0.35)';
            });
            card.addEventListener('mouseleave',function(){card.style.transform='';card.style.boxShadow='';});
        }

        /* Brand-icon sparkle */
        const emoji=['\u2728','\uD83C\uDF3F','\uD83C\uDF3E','\uD83C\uDF3B','\u2B50','\uD83D\uDCA7'];
        const icon = document.getElementById('brand-icon');
        if(icon){
            icon.addEventListener('click',function(e){
                e.stopPropagation();
                const rect=icon.getBoundingClientRect();
                const cx=rect.left+rect.width/2, cy=rect.top+rect.height/2;
                for(let i=0;i<12;i++){
                    const s=document.createElement('div'); s.className='sparkle';
                    s.textContent=emoji[Math.floor(Math.random()*emoji.length)];
                    const ox=(Math.random()-0.5)*120;
                    s.style.cssText='left:'+(cx+ox)+'px;top:'+cy+'px;animation-delay:'+(Math.random()*0.3)+'s;';
                    document.body.appendChild(s); s.addEventListener('animationend',()=>s.remove());
                }
                this.style.transform='rotate(25deg) scale(1.25)';
                setTimeout(()=>{this.style.transform='';},350);
            });
        }

        function spawnRipple(x,y){
            const d=document.createElement('div'); d.className='ripple-dot';
            d.style.cssText='width:60px;height:60px;left:'+(x-30)+'px;top:'+(y-30)+'px;';
            document.body.appendChild(d); d.addEventListener('animationend',()=>d.remove());
        }
    })();
    </script>
    @stack('scripts')

</body>
</html>
