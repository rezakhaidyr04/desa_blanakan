@extends('layouts.app')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center bg-gradient-to-br from-slate-50 to-teal-50 py-16 px-4">
    <div class="max-w-lg w-full text-center">

        <!-- Success Icon -->
        <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-once">
            <svg class="w-12 h-12 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
        </div>

        <h1 class="text-3xl font-bold text-slate-900 mb-3">Pengajuan Berhasil!</h1>
        <p class="text-slate-600 text-lg mb-6">
            Terima kasih, <strong class="text-slate-800">{{ $serviceRequest->name }}</strong>.<br>
            Pengajuan Anda untuk layanan <strong class="text-teal-700">{{ $serviceRequest->service_type_name }}</strong> telah kami terima.
        </p>

        <!-- Ticket Info -->
        <div class="bg-white rounded-2xl border border-teal-200 shadow-sm p-6 mb-8 text-left space-y-4">
            <div class="flex items-center gap-2 mb-4">
                <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center">
                    <svg class="w-4 h-4 text-teal-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                </div>
                <h2 class="font-semibold text-slate-800">Detail Pengajuan</h2>
            </div>

            <div class="grid grid-cols-2 gap-3 text-sm">
                <div>
                    <p class="text-slate-500">Nomor Pengajuan</p>
                    <p class="font-semibold text-slate-800">#{{ str_pad($serviceRequest->id, 6, '0', STR_PAD_LEFT) }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Tanggal Pengajuan</p>
                    <p class="font-semibold text-slate-800">{{ $serviceRequest->created_at->format('d M Y, H:i') }} WIB</p>
                </div>
                <div>
                    <p class="text-slate-500">Jenis Layanan</p>
                    <p class="font-semibold text-slate-800">{{ $serviceRequest->service_type_name }}</p>
                </div>
                <div>
                    <p class="text-slate-500">Status</p>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">Sedang Diproses</span>
                </div>
                <div>
                    <p class="text-slate-500">NIK</p>
                    <p class="font-semibold text-slate-800">{{ $serviceRequest->nik }}</p>
                </div>
                @if(count($serviceRequest->documents ?? []) > 0)
                <div>
                    <p class="text-slate-500">Dokumen Terlampir</p>
                    <p class="font-semibold text-slate-800">{{ count($serviceRequest->documents) }} file</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-amber-50 border border-amber-200 rounded-2xl p-5 mb-8 text-left">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-amber-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                <div>
                    <p class="font-semibold text-amber-900 mb-1">Langkah Selanjutnya</p>
                    <ul class="text-sm text-amber-800 space-y-1">
                        <li>• Datangi kantor desa dengan membawa dokumen asli</li>
                        <li>• Jam pelayanan: Senin–Kamis 08:00–15:00, Jumat 08:00–11:00</li>
                        <li>• Gunakan NIK <strong>{{ $serviceRequest->nik }}</strong> untuk cek status pengajuan Anda</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('layanan.track') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                Cek Status Pengajuan
            </a>
            <a href="{{ route('layanan') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                Kembali ke Layanan
            </a>
        </div>
    </div>
</div>

<style>
@keyframes bounce-once {
    0%, 100% { transform: translateY(0); }
    30% { transform: translateY(-16px); }
    60% { transform: translateY(-6px); }
}
.animate-bounce-once {
    animation: bounce-once 0.8s ease-in-out;
}
</style>
@endsection
