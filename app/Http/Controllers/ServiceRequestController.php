<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceRequestController extends Controller
{
    public function create($type)
    {
        $serviceTypes = [
            'ektp' => [
                'title' => 'Pembuatan e-KTP',
                'requirements' => [
                    'Fotokopi Kartu Keluarga (KK)',
                    'Surat Pengantar RT/RW',
                    'Berusia 17 tahun ke atas'
                ]
            ],
            'kk' => [
                'title' => 'Kartu Keluarga (KK)',
                'requirements' => [
                    'Surat Pengantar RT/RW',
                    'KK Lama (jika pembaruan)',
                    'Buku Nikah / Akta Cerai'
                ]
            ],
            'akta' => [
                'title' => 'Akta Kelahiran',
                'requirements' => [
                    'Surat Keterangan Lahir (Bidan/RS)',
                    'Fotokopi KK & KTP Orang Tua',
                    'Buku Nikah Orang Tua'
                ]
            ],
            'skck' => [
                'title' => 'Surat Keterangan Catatan Kepolisian (SKCK)',
                'requirements' => [
                    'Fotokopi KTP',
                    'Fotokopi Kartu Keluarga',
                    'Pas Foto 4x6 (2 lembar)',
                    'Surat Pengantar RT/RW'
                ]
            ],
        ];

        if (!isset($serviceTypes[$type])) {
            abort(404);
        }

        return view('layanan-form', [
            'type' => $type,
            'service' => $serviceTypes[$type]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_type' => 'required|in:ektp,kk,akta,skck',
            'name' => 'required|string|max:255',
            'nik' => 'required|string|size:16',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'purpose' => 'nullable|string',
            'notes' => 'nullable|string',
            'documents.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048'
        ]);

        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $file) {
                $path = $file->store('service-requests', 'public');
                $documents[] = [
                    'name' => $file->getClientOriginalName(),
                    'path' => $path
                ];
            }
        }

        $validated['documents'] = $documents;

        ServiceRequest::create($validated);

        return redirect()->route('layanan')->with('success', 'Pengajuan layanan berhasil dikirim! Kami akan segera memprosesnya.');
    }

    public function track()
    {
        return view('layanan-track');
    }

    public function checkStatus(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
        ]);

        $requests = ServiceRequest::where('nik', $request->nik)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('layanan-status', compact('requests'));
    }
}
