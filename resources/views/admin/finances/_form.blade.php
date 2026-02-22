@php $f = $finance ?? null; @endphp

@if($errors->any())
    <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-sm text-red-700 mb-2">
        <ul class="list-disc list-inside space-y-1">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-2 gap-5">
    {{-- Tahun --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Tahun <span class="text-red-500">*</span></label>
        <select name="year" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500" required>
            @foreach($years as $y)
                <option value="{{ $y }}" {{ old('year', $f?->year ?? date('Y')) == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endforeach
        </select>
    </div>

    {{-- Jenis --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Jenis <span class="text-red-500">*</span></label>
        <select name="type" class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500" required>
            <option value="">Pilih jenis...</option>
            <option value="pendapatan" {{ old('type', $f?->type) === 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
            <option value="belanja"    {{ old('type', $f?->type) === 'belanja'    ? 'selected' : '' }}>Belanja</option>
            <option value="pembiayaan" {{ old('type', $f?->type) === 'pembiayaan' ? 'selected' : '' }}>Pembiayaan</option>
        </select>
    </div>
</div>

{{-- Kategori --}}
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Kategori <span class="text-red-500">*</span></label>
    <input type="text" name="category" value="{{ old('category', $f?->category) }}"
        placeholder="Contoh: Dana Desa, Bid. Pembangunan Desa" required
        class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500">
</div>

{{-- Item --}}
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Nama Item <span class="text-red-500">*</span></label>
    <input type="text" name="item" value="{{ old('item', $f?->item) }}"
        placeholder="Contoh: Dana Desa dari APBN" required
        class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500">
</div>

<div class="grid grid-cols-2 gap-5">
    {{-- Anggaran --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Anggaran (Rp) <span class="text-red-500">*</span></label>
        <input type="number" name="budget" value="{{ old('budget', $f?->budget) }}"
            placeholder="0" min="0" required
            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500">
    </div>

    {{-- Realisasi --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Realisasi (Rp)</label>
        <input type="number" name="realization" value="{{ old('realization', $f?->realization) }}"
            placeholder="Kosongkan jika belum ada" min="0"
            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500">
    </div>
</div>

{{-- Notes --}}
<div>
    <label class="block text-sm font-medium text-slate-700 mb-1.5">Keterangan</label>
    <textarea name="notes" rows="2" placeholder="Opsional..."
        class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500 resize-none">{{ old('notes', $f?->notes) }}</textarea>
</div>

<div class="grid grid-cols-2 gap-5">
    {{-- Order --}}
    <div>
        <label class="block text-sm font-medium text-slate-700 mb-1.5">Urutan</label>
        <input type="number" name="order" value="{{ old('order', $f?->order ?? 0) }}" min="0"
            class="w-full border border-slate-300 rounded-lg px-3 py-2.5 text-sm focus:ring-teal-500 focus:border-teal-500">
    </div>

    {{-- Status --}}
    <div class="flex items-end pb-1">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $f?->is_active ?? true) ? 'checked' : '' }}
                class="w-4 h-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500">
            <span class="text-sm font-medium text-slate-700">Tampilkan di publik</span>
        </label>
    </div>
</div>
