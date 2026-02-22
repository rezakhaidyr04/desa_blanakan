<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'type',
        'category',
        'item',
        'budget',
        'realization',
        'notes',
        'order',
        'is_active',
    ];

    protected $casts = [
        'budget'      => 'integer',
        'realization' => 'integer',
        'is_active'   => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeYear($query, $year)
    {
        return $query->where('year', $year);
    }

    /** Persentase realisasi terhadap anggaran */
    public function getRealizationPercentAttribute(): float
    {
        if (!$this->budget || !$this->realization) return 0;
        return min(round(($this->realization / $this->budget) * 100, 1), 100);
    }

    /** Format rupiah */
    public static function rupiah(int $amount): string
    {
        return 'Rp ' . number_format($amount, 0, ',', '.');
    }
}
