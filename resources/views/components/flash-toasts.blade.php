@php
    $success = session('success');
    $error = session('error');
    $info = session('info');
@endphp

@if ($success || $error || $info)
    <div class="fixed top-4 right-4 z-[80] space-y-3">
        @if ($success)
            <div data-toast class="w-[22rem] max-w-[calc(100vw-2rem)] rounded-2xl border border-green-200 bg-white shadow-xl shadow-slate-900/10 overflow-hidden">
                <div class="flex items-start gap-3 p-4">
                    <div class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-xl bg-green-50 text-green-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-slate-900">Berhasil</div>
                        <div class="text-sm text-slate-600 mt-0.5">{{ $success }}</div>
                    </div>
                    <button type="button" data-toast-close class="text-slate-400 hover:text-slate-700 transition-colors" aria-label="Tutup">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="h-1 w-full bg-green-100">
                    <div data-toast-bar class="h-1 w-full bg-green-500"></div>
                </div>
            </div>
        @endif

        @if ($error)
            <div data-toast class="w-[22rem] max-w-[calc(100vw-2rem)] rounded-2xl border border-red-200 bg-white shadow-xl shadow-slate-900/10 overflow-hidden">
                <div class="flex items-start gap-3 p-4">
                    <div class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-slate-900">Gagal</div>
                        <div class="text-sm text-slate-600 mt-0.5">{{ $error }}</div>
                    </div>
                    <button type="button" data-toast-close class="text-slate-400 hover:text-slate-700 transition-colors" aria-label="Tutup">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="h-1 w-full bg-red-100">
                    <div data-toast-bar class="h-1 w-full bg-red-500"></div>
                </div>
            </div>
        @endif

        @if ($info)
            <div data-toast class="w-[22rem] max-w-[calc(100vw-2rem)] rounded-2xl border border-slate-200 bg-white shadow-xl shadow-slate-900/10 overflow-hidden">
                <div class="flex items-start gap-3 p-4">
                    <div class="mt-0.5 flex h-9 w-9 items-center justify-center rounded-xl bg-slate-50 text-slate-700">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-slate-900">Info</div>
                        <div class="text-sm text-slate-600 mt-0.5">{{ $info }}</div>
                    </div>
                    <button type="button" data-toast-close class="text-slate-400 hover:text-slate-700 transition-colors" aria-label="Tutup">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
                <div class="h-1 w-full bg-slate-100">
                    <div data-toast-bar class="h-1 w-full bg-slate-500"></div>
                </div>
            </div>
        @endif
    </div>
@endif
