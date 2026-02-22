<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceRequest::query()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('service_type')) {
            $query->where('service_type', $request->string('service_type'));
        }

        if ($request->filled('q')) {
            $q = trim((string) $request->input('q'));
            $query->where(function ($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('nik', 'like', "%{$q}%")
                    ->orWhere('phone', 'like', "%{$q}%");
            });
        }

        $requests = $query->paginate(15)->withQueryString();

        $counts = [
            'all' => ServiceRequest::count(),
            'pending' => ServiceRequest::where('status', 'pending')->count(),
            'processing' => ServiceRequest::where('status', 'processing')->count(),
            'completed' => ServiceRequest::where('status', 'completed')->count(),
            'rejected' => ServiceRequest::where('status', 'rejected')->count(),
        ];

        $serviceTypes = [
            'ektp' => 'Pembuatan e-KTP',
            'kk' => 'Kartu Keluarga (KK)',
            'akta' => 'Akta Kelahiran',
            'skck' => 'Surat Keterangan Catatan Kepolisian (SKCK)',
        ];

        return view('admin.service-requests.index', compact('requests', 'counts', 'serviceTypes'));
    }

    public function show(ServiceRequest $serviceRequest)
    {
        return view('admin.service-requests.show', compact('serviceRequest'));
    }

    public function update(Request $request, ServiceRequest $serviceRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,rejected',
            'admin_notes' => 'nullable|string',
        ]);

        $serviceRequest->status = $validated['status'];
        $serviceRequest->admin_notes = $validated['admin_notes'] ?? null;

        if ($validated['status'] === 'completed') {
            $serviceRequest->processed_at = now();
        } else {
            $serviceRequest->processed_at = null;
        }

        $serviceRequest->save();

        return redirect()->route('admin.service-requests.show', $serviceRequest)
            ->with('success', 'Status pengajuan berhasil diperbarui.');
    }
}
