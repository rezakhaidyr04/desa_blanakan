@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-slate-50 to-teal-50 py-16 md:py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-teal-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('layanan') }}" class="ml-1 text-sm font-medium text-slate-500 hover:text-teal-600 md:ml-2">Layanan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2">Ajukan Layanan</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-slate-900 mb-4">{{ $service['title'] }}</h1>
            <p class="text-slate-600">Lengkapi formulir di bawah ini untuk mengajukan layanan</p>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Info Persyaratan -->
    <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6 mb-8">
        <div class="flex items-start">
            <div class="flex-shrink-0">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-lg font-semibold text-blue-900 mb-2">Persyaratan yang Perlu Disiapkan:</h3>
                <ul class="space-y-2 text-blue-800">
                    @foreach($service['requirements'] as $req)
                    <li class="flex items-start gap-2">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>{{ $req }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8">
        <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="service_type" value="{{ $type }}">

            <!-- Nama Lengkap -->
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="Masukkan nama lengkap sesuai KTP">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIK -->
            <div>
                <label for="nik" class="block text-sm font-semibold text-slate-700 mb-2">NIK <span class="text-red-500">*</span></label>
                <input type="text" id="nik" name="nik" value="{{ old('nik') }}" required maxlength="16" pattern="[0-9]{16}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="16 digit NIK">
                @error('nik')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- No. Telepon -->
            <div>
                <label for="phone" class="block text-sm font-semibold text-slate-700 mb-2">No. Telepon/WhatsApp <span class="text-red-500">*</span></label>
                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="08xxxxxxxxxx">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email (Opsional)</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="email@contoh.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Alamat -->
            <div>
                <label for="address" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap <span class="text-red-500">*</span></label>
                <textarea id="address" name="address" rows="3" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="Masukkan alamat lengkap (RT/RW, Desa, Kecamatan)">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Keperluan (Khusus SKCK) -->
            @if($type === 'skck')
            <div>
                <label for="purpose" class="block text-sm font-semibold text-slate-700 mb-2">Keperluan SKCK <span class="text-red-500">*</span></label>
                <select id="purpose" name="purpose" required
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all">
                    <option value="">Pilih Keperluan</option>
                    <option value="melamar_pekerjaan" {{ old('purpose') == 'melamar_pekerjaan' ? 'selected' : '' }}>Melamar Pekerjaan</option>
                    <option value="pencalonan" {{ old('purpose') == 'pencalonan' ? 'selected' : '' }}>Pencalonan</option>
                    <option value="pendidikan" {{ old('purpose') == 'pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                    <option value="keperluan_bank" {{ old('purpose') == 'keperluan_bank' ? 'selected' : '' }}>Keperluan Bank</option>
                    <option value="lainnya" {{ old('purpose') == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
                </select>
                @error('purpose')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            @endif

            <!-- Upload Dokumen -->
            <div>
                <label for="documents" class="block text-sm font-semibold text-slate-700 mb-2">Upload Dokumen Persyaratan</label>
                <div class="border-2 border-dashed border-slate-300 rounded-xl p-6 text-center hover:border-teal-500 transition-colors">
                    <input type="file" id="documents" name="documents[]" multiple accept=".pdf,.jpg,.jpeg,.png"
                        class="hidden" onchange="displayFileNames(this)">
                    <label for="documents" class="cursor-pointer">
                        <svg class="mx-auto h-12 w-12 text-slate-400 mb-3" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="text-sm text-slate-600"><span class="font-semibold text-teal-600">Klik untuk upload</span> atau drag and drop</p>
                        <p class="text-xs text-slate-500 mt-1">PDF, JPG, JPEG, PNG (max. 2MB per file)</p>
                    </label>
                </div>
                <div id="file-list" class="mt-3 space-y-2"></div>
                @error('documents.*')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Catatan Tambahan -->
            <div>
                <label for="notes" class="block text-sm font-semibold text-slate-700 mb-2">Catatan Tambahan (Opsional)</label>
                <textarea id="notes" name="notes" rows="3"
                    class="w-full px-4 py-3 border border-slate-300 rounded-xl focus:ring-2 focus:ring-teal-500 focus:border-transparent transition-all"
                    placeholder="Tambahkan catatan atau informasi lain yang diperlukan">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-4 pt-4">
                <a href="{{ route('layanan') }}"
                    class="flex-1 py-3 px-6 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition-colors text-center">
                    Batal
                </a>
                <button type="submit"
                    class="flex-1 py-3 px-6 bg-gradient-to-r from-teal-600 to-teal-500 text-white font-semibold rounded-xl hover:shadow-lg hover:-translate-y-0.5 transition-all">
                    Kirim Pengajuan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function displayFileNames(input) {
    const fileList = document.getElementById('file-list');
    fileList.innerHTML = '';
    
    if (input.files.length > 0) {
        Array.from(input.files).forEach(file => {
            const div = document.createElement('div');
            div.className = 'flex items-center gap-2 text-sm text-slate-600 bg-slate-50 px-3 py-2 rounded-lg';
            div.innerHTML = `
                <svg class="w-4 h-4 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span>${file.name}</span>
                <span class="text-xs text-slate-400 ml-auto">(${(file.size / 1024).toFixed(1)} KB)</span>
            `;
            fileList.appendChild(div);
        });
    }
}
</script>
@endsection
