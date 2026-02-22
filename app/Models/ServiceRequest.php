<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_type',
        'name',
        'nik',
        'phone',
        'email',
        'address',
        'purpose',
        'documents',
        'notes',
        'status',
        'admin_notes',
        'processed_at',
    ];

    protected $casts = [
        'documents' => 'array',
        'processed_at' => 'datetime',
    ];

    public function getServiceTypeNameAttribute()
    {
        $types = [
            'ektp' => 'Pembuatan e-KTP',
            'kk' => 'Kartu Keluarga (KK)',
            'akta' => 'Akta Kelahiran',
            'skck' => 'Surat Keterangan Catatan Kepolisian (SKCK)',
        ];

        return $types[$this->service_type] ?? $this->service_type;
    }

    public function getStatusBadgeAttribute()
    {
        $badges = [
            'pending' => '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>',
            'processing' => '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>',
            'completed' => '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>',
            'rejected' => '<span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">Ditolak</span>',
        ];

        return $badges[$this->status] ?? $this->status;
    }
}
