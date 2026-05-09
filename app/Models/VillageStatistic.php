<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class VillageStatistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'value',
        'unit',
        'notes',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'is_active'  => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Return the statistics used on the homepage.
     * Falls back to a static default set when the table is empty,
     * so the page keeps rendering without broken cards.
     */
    public static function forHome(): Collection
    {
        $statistics = static::query()->active()->ordered()->get();

        if ($statistics->isNotEmpty()) {
            return $statistics;
        }

        return collect([
            new static([
                'key' => 'dusun',
                'label' => 'Dusun',
                'value' => '3',
                'unit' => null,
                'notes' => 'Data bawaan sementara sampai admin mengisi statistik resmi.',
                'sort_order' => 1,
                'is_active' => true,
            ]),
            new static([
                'key' => 'penduduk',
                'label' => 'Penduduk',
                'value' => '12.000',
                'unit' => '+',
                'notes' => 'Data bawaan sementara sampai admin mengisi statistik resmi.',
                'sort_order' => 2,
                'is_active' => true,
            ]),
            new static([
                'key' => 'rtrw',
                'label' => 'RT/RW',
                'value' => '56',
                'unit' => null,
                'notes' => 'Data bawaan sementara sampai admin mengisi statistik resmi.',
                'sort_order' => 3,
                'is_active' => true,
            ]),
            new static([
                'key' => 'layanan_digital',
                'label' => 'Layanan Digital',
                'value' => '24',
                'unit' => 'h',
                'notes' => 'Data bawaan sementara sampai admin mengisi statistik resmi.',
                'sort_order' => 4,
                'is_active' => true,
            ]),
        ]);
    }

    public function getDisplayValueAttribute(): string
    {
        $value = trim((string) $this->value);
        $unit = trim((string) ($this->unit ?? ''));

        if ($unit === '' || $unit === null) {
            return $value;
        }

        return $value . $unit;
    }
}
